<?php
    require "../mediaServer/site/core/model.php";
    require '../mediaServer/site/models/ajax_requests/pdo_connection.php';
    class Calendar extends model
    {

        private $days_name = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
        private $order_days_name = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
        private $months_name = ['January','Februari','March','April','May','June','July','August','September','Oktober','November','December'];
        public function __construct()
        {

           parent::__construct();

        }


        public function currentMonth()
        {

           $months = $this->months_name[date('n')-1];
           return $months;

        }


        public function currentMonthNumb()
        {

           $nowDatTime = new DateTime();
           $months = $nowDatTime->format('m');
           return $months;


        }


        public function currentDay()
        {

           $date = new DateTime();
           $dayName = substr(str_replace(0, 7, $this->days_name[$date->format('w')]), 0,3);
           $dayNumb = $date->format('j');
           $month = $this->currentMonth();

           $current_day = $dayName.' '.$dayNumb.' '.substr($month, 0,3);

           $hour = $date->format('H');
           $min = $date->format('i');
           $currentTime = $hour.":".$min;

           $dateTimeArr = ['dateNow' => $current_day, 'timeNow' => $currentTime];

           $date->add(new DateInterval('P1M'));

           return $dateTimeArr;

        }


        public function agenda()
        {

           $currentYear = date('Y');
           $date = new DateTime($currentYear.'-'.$this->currentMonthNumb().'-01');
           $calendar = array();

           while($date->format('Y') <= $currentYear)
           {

              $year = $date->format('Y');
              $months = /*$this->months_name[$date->format('n')-1];*/$this->currentMonth();
              $days = $date->format('j');
              $weeks = str_replace(0, 7, $this->days_name[$date->format('w')]);

              $calendar[$year][$months][$days] = $weeks;

              $date->add(new DateInterval('P1D'));

           }

           return current($calendar);

        }



        public function eventNotifier($eventDay)
        {

           $pdo = pdo();
           $eventNotification = $pdo->prepare("SELECT name FROM events WHERE start_date=? LIMIT 3");
           $eventNotification->execute(array($eventDay));
           while($displayNotificationBar = $eventNotification->fetch())
           {

              ?>

                <hr class="notificationBar" style="border: 1px solid #F65F59; width: 100%; color: #F65F59;"/>

              <?php

           }

        }


        public function display_calendar()
        {

            $calendar = $this->agenda();
            foreach ($calendar as $months => $days) {

              ?>

                <div class="monthsCont" id="<?php echo $months.date('Y');?>">

                    <div class="weeksName">

                       <?php

                          foreach ($this->order_days_name as $weeks) {

                            $subWeeks = substr($weeks, 0,2);
                            ?>

                              <h3><?php echo $subWeeks;?></h3>

                            <?php

                          }

                         ?>

                    </div>

                   <div class="days">

                     <?php

                     foreach ($days as $day => $week) {

                       ?>

                              <div class="daysNumb">

                                 <?php

                                    if($day == date('j'))
                                    {

                                       ?>

                                        <p class="<?php echo $months;?>"style="color: #F65F59; transform: scale(1.5,1.5);"><?php echo $day;?></p>

                                       <?php

                                    }else{

                                      ?>

                                       <p class="<?php echo $months;?>"><?php echo $day;?></p>

                                      <?php

                                    }

                                  ?>

                                 <div class="eventNotification">

                                   <?php

                                       $cur_year = date('Y');
                                       $cur_month = date('m');

                                       $dayEvents = $day.'-'.$cur_month.'-'.$cur_year;
                                       $this->eventNotifier($dayEvents);

                                    ?>

                                 </div>

                              </div>

                       <?php

                     }

                      ?>

                   </div>

                </div>

                <script type="text/javascript">

                   $(function()
                   {

                      let monthsCont = document.querySelector('.monthsCont');
                      let agengaBody = document.querySelector('.agengaBody');
                      for (var i = 0; i < monthsCont.length; i++) {

                         agengaBody.appendChild(monthsCont);

                      }

                   })

                </script>

              <?php

            }

        }



       public function get_family_lids()
       {

           $pdo = pdo();
           $getLids = $pdo->query("SELECT * FROM family_lids");
           while($displayLids = $getLids->fetch())
           {

              ?>

              <div class="lids">

                 <div class="allLids" style="border: 1px solid <?php echo $displayLids['lid_color'];?>;">

                 </div>

                 <p style="color: <?php echo $displayLids['lid_color'];?>;"><?php echo $displayLids['lid_name'];?></p>

              </div>

              <?php

           }

       }

    }

 ?>
