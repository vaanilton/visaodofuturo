<?php
namespace backend\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\db\Query;

class MyComponent extends Component
{

    public function timeAgo($date) {
        $cur_time = time();
        $time_ago = strtotime($date);
        $time_elapsed = $cur_time - $time_ago;
        $seconds = $time_elapsed;
        $minutes = round($time_elapsed / 60);
        $hours = round($time_elapsed / 3600);
        $days = round($time_elapsed / 86400);
        $weeks = round($time_elapsed / 604800);
        $months = round($time_elapsed / 2600640);
        $years = round($time_elapsed / 31207680);
        // Seconds
        if ($seconds <= 60) {
            return " $seconds Seconds";
        }
        //Minutes
        else if ($minutes <= 60) {
            if ($minutes == 1) {
                return " one minutes ago";
            } else {
                return " $minutes minutes ago";
            }
        }
        //Hours
        else if ($hours <= 24) {
            if ($hours == 1) {
                return " one hour";
            } else {
                return " $hours hours ago";
            }
        }
        //Days
        else if ($days <= 7) {
            if ($days == 1) {
                return "yesterday";
            } else {
                return " $days days ago";
            }
        }
        //Weeks
        else if ($weeks <= 4.3) {
            if ($weeks == 1) {
                return " one  week ago";
            } else {
                return " $weeks weeks ago";
            }
        }
        //Months
        else if ($months <= 12) {
            if ($months == 1) {
                return " one months ago";
            } else {
                return " $months months ago";
            }
        }
        //Years
        else {
            if ($years == 1) {
                return " one ago";
            } else {
                return "   $years years ago";
            }
        }
    }

    //conta numero dias - 2 dates
    protected function NumDays($start, $last) {
        $first_date = strtotime($start);
        $second_date = strtotime($last);
        $offset = $second_date-$first_date;
        return floor($offset / (60 * 60 * 24)+1);
    }

    //verifica mês
    protected function Getmonth($first,$last){
        $month1 = date('m', strtotime($first));
        $month2 = date('m', strtotime($last));
        if ($month1 == '02' && $month2 == '02') {
            return 28;
        } else {
            return 30;
        }
    }


    public function getNumDiasHora($data){
        return $this->timeAgo($data);
        //commented 5 days ago
   }

   //check if a string is a URL
   public function isValidURL($url)
   {
       return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*
       (:[0-9]+)?(/.*)?$|i', $url);
   }

 

   //cut text
   public function shortdata($string, $len) {
       $i = $len;
       while ($i < strlen($string)) {
           if ($string[$i] == ' ') {
               $string = substr($string, 0, $i) . "...";
               return $string;
           }
           $i++;
       }
       return $string;
   }

   public function verificarImg($img){
      if (filter_var($img, FILTER_VALIDATE_URL) === FALSE) {
          $imglink=str_replace('../', '', $img);
          $fullPath='../'.$imglink;

          if(file_exists($fullPath) && $imglink!='' ) {
              $imagem = $fullPath;
          } else{
              $imagem =\Yii::$app->params['defaultImg'];
          }
      } else {
          $imagem = $img;
      }
      return $imagem;
  }

  public function getCountLive($id){

    return (new \yii\db\Query())
    ->select(['id_live'])
    ->from('live_view l')
    ->where(['id_live' => $id])
    ->count();
  }
}

?>
