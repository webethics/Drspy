<?php
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use  Auth, Redirect, Session, DB, View, Input, Mail;
use App\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/*All common functions to declared here*/

function pr($string, $isnull=false) {
  echo '<pre>';
  print_r($string);
  echo '</pre>';

  if($isnull)
    die('here');
}

/*Function to update the data*/
function update_data($table_name, $match_id, $id, $array) {
  try {
    $response = DB::table($table_name)
                  ->where($match_id, $id)
                  ->update($array);

    return $response;
  } catch (\Exception $e) {
    pr($e->getMessage());
    $log = ['message' => 'Error in Updating data', 'description' => $e->getMessage()];
    write_log($log);
  }
}

/*function to write logs*/
function write_log($log) {
  $orderLog = new Logger('order');
  $orderLog->pushHandler(new StreamHandler(storage_path('logs/frontend.log')), Logger::INFO);
  $orderLog->info('OrderLog', $log);
}

function admin_write_log($log) {
    $orderLog = new Logger('admin');
    $orderLog->pushHandler(new StreamHandler(storage_path('logs/admin.log')), Logger::INFO);
    $orderLog->info('AdminLog', $log);
}

/*function to send email*/
// function admin_send_email($id) {
//   try {
//     $send_email = 'pathcodertest@gmail.com';
//     $data = wizardModel::find($id);
//     Mail::send('emails.message',['user' => $id, 'site_name'=>$data->site_name, 'instance_name'=>$data->instance_name  ],  function ($message) {
//          $message->from('pathcodertest@gmail.com', 'Site details are deleted for the user');
//          $message->to('pathcodertest@gmail.com', 'sss')->subject('Your Reminder!');
//     });
//     return true;
//   } catch (\Exception $e) {
//     $log = ['message' => 'Error in sending mail', 'description' => $e->getMessage()];
//     write_log($log);
//     return false;
//   }
// }

/*get base url*/
function base_url() {
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  );
}

/*function tim thumb */
function timthumb($img, $w, $h){
    $user_img =  url('/plugin/timthumb/timthumb.php').'?src='.$img.'&w='.$w.'&h='.$h.'&zc=2&q=99';
    return $user_img ;
}

/*function to create a hireacrchy*/
function buildTree(array $elements, $parentId = 0) {
    $branch = array();

    foreach ($elements as $element) {
        if ($element['extention_type'] == 'Category 1') {
            $children = buildTree($elements, $element['id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }
  return $branch;
}

/*Database based helper functions*/
function get_sidebar_categories() {
  $get_category = DB::table('categoryname')
                    ->join('subcategorytable', 'categoryname.id', '=', 'subcategorytable.category_id')
                    ->join('maincategory', 'categoryname.maincategory_id', '=', 'maincategory.id')
                    ->select('categoryname.*', 'subcategorytable.*',  'maincategory.*', 'subcategorytable.id')
                    ->get();
  return $get_category;
}
?>
