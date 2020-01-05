<?php
 include_once 'header.php';

 ?>
<section class="main-container">
  <div class="main-wrapper">
      <h2 class="headerT">HOME</h2>
      <div class="about">
          <a href="#" class="htag" ><u>About Us</u></a>

              <p >This system is to enhance the relationship between students,alumni members and the teachers of university of moratuwa.
                  The students can present any of their problems to the teachers or the alumni members.The teachers and the alumni members together can discuss issues in the
                  university and take nesseasarry steps to fix them.
              </p>
              <p>
                  The System can be used by Students ,Teachers,Alumni members and Administrators for the betterment of each other.
                  Our mission is to serve the university to the maximam potential with this web app.
              </p>

          <script src="https://code.jquery.com/jquery-3.3.1.min.js"
                  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                  crossorigin="anonymous"></script>
          <script src="https://bitstorm.org/jquery/color-animation/jquery.animate-colors-min.js"></script>
          <script>
              var num=0;
                  $(".about p").css("display","none");
                  $(".about a").click(function(){
                      console.log("Working");
                      if(num==0){
                          $(".about").animate({width:"30%" ,color:'white'}
                              ,1000,function(){

                              });
                          $(".about p").show();
                          num=1;
                      }
                      else{
                          $(".about").animate({width:"10%",color:'rgba(0,0,0,0)'}
                              ,1000,function(){

                              });
                          $(".about p").hide();


                          num=0;
                      }

                  });


          </script>

      </div>
      <?php
        if(isset($_SESSION['u_id'])){
            if($_SESSION['u_role']=="student"){
                echo ' <div class="homeclass">
                <p>Welcome ';
                echo $_SESSION['u_first'];
                echo' to the Student-Alumni relationship enhancement system. Here you can discuss your issues with the past members of the university and we hope you will use this system to enhance your skills!!</p>
            </div>';
            }
            elseif ($_SESSION['u_role']=="teacher"){
                echo ' <div class="homeclass">
                <p>Welcome ';
                echo 'sir/madam';
                echo' to the Student-Alumni relationship enhancement system.You are welcome to give your valuable advice to the students!!</p>
            </div>';
            }
            elseif ($_SESSION['u_role']=="administrator"){
                echo ' <div class="homeclass">
                <p>You are an ADMINISTRATOR!!</p>
            </div>';
            }
            elseif($_SESSION['u_role']=="alumni"){
                echo ' <div class="homeclass">
                <p>Welcome ';
                echo 'sir/madam';
                echo' to the Student-Alumni relationship enhancement system. You can give your valuable advice to the students to build their carrier!!</p>
            </div>';
            }

        }
        else{
            echo ' <div class="homeclass">
            <p>Welcome To the Student-Alumni relationship enhancement system!!</p>
            </div>';
        }
      ?>

  </div>

</section>

<?php
include_once 'footer.php';
?>