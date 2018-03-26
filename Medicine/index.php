<?php
   include'all.php';
?>
  <div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h2>Medicine Search</h2>
                    <input class="form-control input-lg" id="search" placeholder="search drug" type="text">
                    <br>
                    <center>
                        <input type="button" id="button" value="Search" class="btn btn-primary btn-outline btn-lg">
                    </center>
                </div>
            </div>
        </div>
        <div id="results">
            <table class="table table-striped table-condensed voc_list ">

                <thead>
                    <tr>
                        <th>Thumbnail</th>
                        <th>Name</th>
                        <th>Manufacturer</th>
                        <th>Form</th>
                        <th>Quantity</th>
                        <th>Mrp</th>
                        <th>Buy</th>
                    </tr>
                </thead>

                <tbody id="contents">
                </tbody>

            </table>
        </div>
    </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
        var textInput = document.getElementById('search');
        var timeout = null;
        textInput.onkeyup = function(e) {
            clearTimeout(timeout);

            // Make a new timeout set to go off in 800ms
            timeout = setTimeout(function() {
                bookSearch()
            }, 500);
        };


        function bookSearch() {
            var search = document.getElementById('search').value;
            document.getElementById('contents').innerHTML = "";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", 'output.php?search=' + search, false);
            xmlhttp.send(null);
            var data = xmlhttp.responseText;
            console.log(data);
            var result = data.split("<br><br>");
            for (i = 0; i < result.length - 1; i++) {
                var output = result[i].split('1234');
                var img = 'Capsule.png';
                if(output[2] == 'Tablet'){
                  img = 'Tablet.png';
                }
                else if(output[2] == 'Capsule'){
                  img = 'Capsule.png';
                }
                else if(output[2] == 'Syrup' || output[2] == 'ointment ' || output[2] == 'solution'){
                  img = 'Syrup.png';
                }
                contents.innerHTML += '<tr class="listview"><td style="padding:15px 0px 15px 0px;"><img src="'+img+'" class="img-responsive voc_list_preview_img" alt="" title="" width="75"></td> <td style="padding:15px 0px 15px 0px;"> '+output[0]+' </td><td style="padding:15px 15px 15px 15px;"> '+output[1]+' </td><td style="padding:15px 15px 15px 15px;"> '+output[2]+' </td><td style="padding:15px 15px 15px 15px;"> '+output[3]+' </td><td style="padding:15px 15px 15px 15px;"> '+output[4]+' </td><td style="padding:15px 15px 15px 15px;"> <button type="button" class="btn btn-primary btn-md"><a style = "color:white"href="#?search='+output[0]+'">Buy</a></button></td></tr>'
            }
        }

        document.getElementById('button').addEventListener('click', bookSearch, false)
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</section>
</div>