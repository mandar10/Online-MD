<?php
   include'all.php';
?>
<style>
    .li-hover:hover{

    }
    .bg-title{
      background: rgba(221,75,57,1);
      background: -moz-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
      background: -webkit-gradient(left top, right top, color-stop(0%, rgba(221,75,57,1)), color-stop(0%, rgba(221,75,57,1)), color-stop(59%, rgba(221,75,57,1)), color-stop(97%, rgba(241,111,92,1)), color-stop(100%, rgba(241,111,92,1)));
      background: -webkit-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
      background: -o-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
      background: -ms-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
      background: linear-gradient(to right, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#dd4b39', endColorstr='#f16f5c', GradientType=1 );
    }

    .bg-title2{
      background: rgba(221,75,57,1);
      background: -moz-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 27%, rgba(241,111,92,1) 90%, rgba(241,111,92,1) 100%);
      background: -webkit-gradient(left top, right top, color-stop(0%, rgba(221,75,57,1)), color-stop(0%, rgba(221,75,57,1)), color-stop(27%, rgba(221,75,57,1)), color-stop(90%, rgba(241,111,92,1)), color-stop(100%, rgba(241,111,92,1)));
      background: -webkit-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 27%, rgba(241,111,92,1) 90%, rgba(241,111,92,1) 100%);
      background: -o-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 27%, rgba(241,111,92,1) 90%, rgba(241,111,92,1) 100%);
      background: -ms-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 27%, rgba(241,111,92,1) 90%, rgba(241,111,92,1) 100%);
    }

    @media only screen and (max-width: 990px) {
        .pm, .pro-box{
          border-bottom:solid 1px silver;
          padding-bottom: 10px;
        }

        .boxzol{
          margin-bottom:20px;
        }

        .forum{
          margin-left:5px;
          margin-right:5px;
        }

        .forum2{
          margin-left:5px;
          margin-right:5px;
        }

        .topinfo{
          margin-left:2px;
          margin-right:2px;

        }



    }


          @media only screen and (max-width:600px){
              .prod-img{
                  width:100px !important;
                  height:100px !important;
              }
          }

          @media only screen and (max-width:400px){
            .font-head{
                font-size: 14px !important;
            }
          }

    @media only screen and (min-width: 990px) {
      .pm{
        border-right:solid 1px silver;
      border-left:solid 1px silver;
      }

      .boxzol{
        margin-bottom:10px;
      }

      .topinfo{
        margin-left:10px;
        margin-right:10px;

      }

      .forum2{
        padding-left: 0px;
      }
    }

</style>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <section class="content">
    <div class="row" style="background-color:#ecf0f5;height:5px;">

    </div>
      <?php
        $content= file_get_contents("http://192.168.88.152/ss/quickstart.php");
        $content1=explode("/",$content);
        ?>
      <div class="row" style="margin:10px -7px; ">
        <!-- Left col -->

        <!-- /.col -->

        <div class="col-md-7 col-md-offset-1 forum">
          <!-- Info Boxes Style 2 -->

        <?php
        foreach($content1 as $temp)
        {
          $content2=explode(",",$temp);
          if($content2[0])
          {
              $query="SELECT * FROM login WHERE id='".$content2[3]."'";
              $query_run=mysqli_query($con,$query);
              $mrow=mysqli_fetch_assoc($query_run);
              ?>
                    <!-- /.row -->
      
                        <!-- PRODUCT LIST -->
          <div class="box box-primary" style="border-top-color:#d2d6de;">
            <div class="box-header with-border bg-title" style="">
              <h3 class="box-title" style="color:white;">Medicines</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div>
                    <div class="product-img">
                      <img class="prod-img" src="Tablet.png" style="width:200px;height:200px;" alt="Product Image">
                    </div>
                    <div class="product-info" style="margin-left:100px;">
                      <a class="font-head" style="color:grey;font-size:20px;margin-left: 10px;" href="profile.php">
                        <?php echo '<b>'.$content2[0].'</b>'; ?>
                      </a>
                      <br>
                      <a href="profile.php?id= <?php echo $content2[3]; ?>" class="product-title font-head" style="margin-left:10px;font-size:17px;"><?php echo 'Seller: Ch. '.$mrow['firstname'].' '.$mrow['surname']; ?>
                        <span class="label pull-right " style="font-size:13px;color:#999999;"><?php echo 'available'; ?></span>
                      </a>
                    </div>
                    <div style="margin-left:115px;">
                    <span style="margin-left:10px;margin-top:3px;font-size:16px;" class="label label-success pull-left"><?php echo $content2[1];?> Pcs</span>&nbsp
                    <span style="margin-left:10px;margin-top:3px;font-size:16px;margin-left:5px" class="label label-danger pull-left"><?php echo $content2[2];?> Rs</span> 
                    <br>
                    <br>
                    <br>
                    <br>
                    <button type="submit"  id="quantity" class="btn pull-right btn-success" ><?php echo 'Buy';?>&nbsp &nbsp<i class="fa fa-check-square-o" ></i></button>
                  </div>
                  </div>
                </li>
                
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

        
        <!-- /.col -->              
              <?php
          }
        }
      ?>

      <!-- Main row -->


        </div>
        <div class="col-md-3 forum2" style="">

          <!-- /.box -->
      </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
   include'footer.php';

?>
