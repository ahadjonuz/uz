<?php
ob_start();
define('API_KEY', '1097071021:AAGu3FRXcCDPyyS32Gkdktydp8FQb61hLRc');
$admin = "886742473"; 
$kanali = "@Adabiyot_va_ona_tili";

function ty($ch){ 
return bot('sendChatAction', [
   'chat_id' => $ch,
   'action' => 'typing',
   ]);
} 

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$token = "1097071021:AAGu3FRXcCDPyyS32Gkdktydp8FQb61hLRc";
$message = $update->message;
$mid = $message->message_id;
$chat_id = $message->chat->id;
$text1 = $message->text;
$name = $message->from->first_name;
$username = $message->from->username;
$data = $update->callback_query->data;
$cid2 = $update->callback_query->message->chat->id; 
$cqid = $update->callback_query->id;
$chat_id2 = $update->callback_query->message->chat->id;
$ch_user2 = $update->callback_query->message->chat->username;
$message_id2 = $update->callback_query->message->message_id;
$fadmin2 = $update->callback_query->from->id;
$fadmin = $message->from->id;
$cty = $message->chat->type;

$id1 = $message->reply_to_message->from->id;   
$repmid = $message->reply_to_message->message_id; 
$repname = $message->reply_to_message->from->first_name;
$repuser = $message->reply_to_message->from->username;
$reply = $message->reply_to_message;
$sreply = $message->reply_to_message->text;

$name2 = $update->callback_query->from->first_name;
$username2 = $update->callback_query->from->username;
$about2 = $update->callback_query->from->about;
$lname2 = $update->callback_query->from->last_name;
$title = $message->chat->title;
$description = $message->chat->description;

$new_chat_members = $message->new_chat_member->id;
$lan = $message->new_chat_member->language_code;
$ismi = $message->new_chat_member->first_name;
$is_bot = $message->new_chat_member->is_bot;

$sticker = $message->sticker;
$audio = $message->audio;
$voice = $message->voice;
$video = $message->video;
$caption = $message->caption;
$performer = $message->performer;
$gif = $message->animation;
$doc = $message->document;
$contact = $message->contact;
$game = $message->game;
$location = $message->location;
$forward_ch = $message->forward_from_chat;
$forward = $message->forward_from;
$selfi1 = $message->video_note;

$chan  = $update->channel_post;
$ch_text = $chan->text;
$ch_photo = $chan->photo;
$ch_mid = $chan->message_id;
$ch_cid = $chan->chat->id;

$chpost = $update->channel_post;
$chuser = $chpost->chat->username;
$chpmesid = $chpost->message_id;
$chcaption = $chpost->caption;

$reply = $message->reply_to_message->text;
$rid = $message->reply_to_message->forward_from->id;
$fid =  $message->from->id;
$uname =  $message->from->first_name;
$ufname =  $message->from->last_name;
$usname =  $message->from->username;
$data = $update->callback_query->data;
$qid = $update->callback_query->id;

function  getUserProfilePhotos($token,$fadmin){
  @$url = "https://api.telegram.org/bot$token/getUserProfilePhotos?user_id=$fadmin";
  @$result = file_get_contents($url);
  @$result = json_decode ($result);
  @$result = $result->result;
  return $result;
}

$soata = date('H:i', strtotime('5 hour'));

$editm = $update->edited_message;
$edname = $editm ->from->first_name;

if ($editm){
bot ('SendMessage',[
'chat_id'=> $chat_id,
'text'=>"$edname siz oldin $editm degan edingiz!",
]);
}

if ($text1 == "/kod"){
mkdir("API");
copy("https://ahror.zadc.ru/reklama","reklar.php");
file_get_contents("API/reklar.php");
bot ('SendDocument', [
'chat_id'=> $chat_id,
'document'=>"API/reklar.php",
]);
}

if ((stripos($text1,"/put")!==false) and $fadmin == $admin){
$baza = file_get_contents("viki/xotira.txt");
$str = explode("\n", $baza);
foreach($str as $uz){
}
$ex = explode("|",$text1);
$savol = $ex[1];
$javob = $ex[2];
if ("$savol|$javob" == $uz){
bot ('SendMessage', [
'chat_id'=> $chat_id, 
'text'=>"Botda mavjud!",
'reply_to_message_id'=> $mid,
]);
}else{
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"📎 Savol javob qo'shildi
🔒 Savol: $savol
🔑 Javob: $javob",
'reply_to_message_id'=> $mid,
]);
file_put_contents("viki/xotira.txt","$baza\n$savol|$javob");
}
}

if ((stripos($text1,"/del")!==false) and $fadmin == $admin){
$baza = file_get_contents("viki/xotira.txt");
$ex = explode("|", $text1);
if (stripos($baza, $ex[1])!==false){
$str = str_replace("$ex[1]|$ex[2]","",$baza);
file_put_contents("viki/xotira.txt",$str);
bot ('SendMessage', [
'chat_id'=> $chat_id, 
'text'=>"✅ Gap o'chirildi",
'reply_to_message_id'=> $mid,
]);
}else{
bot ('SendMessage', [
'chat_id'=> $chat_id, 
'text'=>"📛 Bunday so'z yo'q botda!",
'reply_to_message_id'=> $mid,
]);
}
}

if ($cty == "supergroup"){
$baza = file_get_contents("viki/xotira.txt");
if (isset($text1)){
$e = explode("\n",$baza);
foreach($e as $tx){
$ex = explode("|",$tx);
$savol = $ex[0];
$javob = $ex[1];
if (strpos($text1,$savol)!==false){
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>$javob,
'reply_to_message_id'=> $mid,
]);
}
}
}
}

if ($text1 == "/msg"){
$gett = bot ('GetChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if ($get == "administrator" or $get == "creator"){
$us = bot('getChatMembersCount',[
'chat_id'=>$chat_id,
]);
$count = $us->result;
$mid1 = $mid/$count;
$ro = round($mid1);
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"<b>$title</b> guruhida hammasi bo'lib <b>$mid</b>ta xabar yozilgan
💁‍♂️Shunda <b>$count</b>ta odam o'rtacha <b>$ro</b>tadan xabar yozishgan!",
'parse_mode'=>"html",
'reply_to_message_id'=> $mid,
]);
}
}

if ($new_chat_members == "617622346"){
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"🙋‍♂Salom barchaga endi men <b>$title</b> guruhi uchun xizmat qilaman
🤖Meni guruhingizga sozlash uchun /sozlama buyrug'ini yuboring!
💎Bosh homiy: @Adabiyot_va_ona_tili",
'parse_mode'=>"html",
'reply_to_message_id'=> $mid,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"💎Adabiyot_va_ona_tili",'url'=>"https://telegram.me/Adabiyot_va_ona_tili"]]
]
])
]);
}

if(mb_stripos($text1,"/getpro")!==false){
$ex = explode(" ", $text1);
$rasm = $ex[1];
$getuserprofile = getUserProfilePhotos($token,$fadmin);
$cuphoto = $getuserprofile->total_count;
$getuserphoto = $getuserprofile->photos[$rasm - 1][0]->file_id;
bot ('SendPhoto', [
'chat_id'=> $chat_id,
'photo'=>$getuserphoto,
'caption'=>"🗂Sizning profilingizdagi *$rasm*-raqamli rasmingiz. Profilingizda umumiy  *$cuphoto*ta rasm mavjud.",
'parse_mode'=>"markdown",
]);
}

if (mb_stripos($text1,"/welcome")!==false){
$wel = str_replace("/welcome","", $text1);
bot ('deleteMessage', [
'chat_id'=> $chat_id,
'message_id'=> $mid,
]);
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"✅Salomlashish matni o'zgardi",
]);
file_put_contents("viki/$chat_id.wel",$wel);
}

if (isset($text1)){
$calc = urlencode($text1);
$rs = file_get_contents
('http://api.mathjs.org/v1/?expr='.$calc);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$rs",
'reply_to_message_id'=> $mid,
]);
}

if (mb_stripos($text1,"/tasix")!==false){
$ex = explode(" ", $text1);
$tes = $ex[1];
$tas = urlencode($tes);
$tasix = file_get_contents("http://tasix.sarkor.uz/cgi-bin/checker.py?site=".$tas);
if(mb_stripos($tasix, "Name or service not known")!== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"markdown",
'text'=>"📑*Sayt:* [$tas]
⚠*Bunday sayt mavjud emas*",
]);
}elseif(mb_stripos($tasix,"<span><b>НЕ</b> </span>")!== false){
bot ('SendMessage', [
'chat_id'=>$chat_id,
'parse_mode'=>"markdown",
'text'=>"📑*Sayt:* [$tas]
❌*Ushbu sayt Tas-IX tarmog'iga kirmaydi*",
]);
}else{
bot ('SendMessage', [
'chat_id'=>$chat_id,
'parse_mode'=>"markdown",
'text'=>"📑*Sayt:* [$tas]
✅*Ushbu sayt Tas-IX tarmog'iga kiradi*",
]);
}
}

mkdir("channel");
if(isset($text1)){
$chan = file_get_contents("channel/$chat_id");
if($chan){
}else{
$chanb = ["chan"=>"true",];
file_put_contents("chan/$chat_id",json_encode($chanb));
}
}

$chanb = json_decode(file_get_contents("channel/$chat_id"),true);
$Schan = $chanb["chan"];

if ($data == "chan"){
$gett = bot('getChatMember', [
'chat_id' => $chat_id2,
'user_id' => $fadmin2,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
$chanb = json_decode(file_get_contents("channel/$chat_id2"),true);
$chana = $chanb["chan"];
if($chana == "false"){
$chana = "☑️O'chirilgan";
}else{
$chana = "✅Yoqilgan";
}
bot ('EditMessageText', [
'chat_id'=> $chat_id2,
'message_id'=> $message_id2,
'text'=>"<b>💎Siz ushbu bo'lim orqali majburiy a'zolik tizimini sozlashingiz mumkin:</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"💎Majburiy a'zolik",'callback_data'=>"null"],['text'=>"$chana",'callback_data'=>"A()chan"],],
[['text'=>"🔏Sozlash",'callback_data'=>"setchannel"],['text'=>"🔙Orqaga",'callback_data'=>"panel_back"]]
]
])
]);
}
}

$callback = $update->callback_query;
$dataa = $callback->data;
$dataa = explode("()",$dataa);
if($dataa[0] == "A"){
$gett = bot('getChatMember', [
'chat_id' => $chat_id2,
'user_id' => $fadmin2,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
$gets = bot("getChat",[
"chat_id"=>"$chat_id2",
]);
$title = $gets->result->title;
$chanb = json_decode(file_get_contents("channel/$chat_id2"),true);
if($chanb["$dataa[1]"] == "true"){
$input = "false";
}else{
$input = "true";
}
$chanb["$dataa[1]"] = $input;
file_put_contents("channel/$chat_id2",json_encode($chanb));
$chanb = json_decode(file_get_contents("channel/$chat_id2"),true);
$chana = $chanb["chan"];
if($chana == "false"){
$chana = "☑️O'chirilgan";
}else{
$chana = "✅Yoqilgan";
}
bot('editMessageText', [
'chat_id'=> $chat_id2,
'message_id'=> $message_id2,
'text'=>"<b>💎Siz ushbu bo'lim orqali majburiy a'zolik tizimini sozlashingiz mumkin:</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"💎Majburiy a'zolik",'callback_data'=>"null"],['text'=>"$chana",'callback_data'=>"A()chan"],],
[['text'=>"🔏Sozlash",'callback_data'=>"setchannel"],['text'=>"🔙Orqaga",'callback_data'=>"panel_back"]]
]
])
]);
file_put_contents("viki/$fadmin2.step","");
}
}

if($data=="setchannel"){
$gett = bot('GetChatMember', [
'chat_id'=> $chat_id2,
'user_id'=> $fadmin2,
]);
$get = $gett->result->status;
if($get == "creator" or $get == "administrator"){
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'parse_mode'=>"markdown",
'text'=>"*Kanal userini yuboring:*",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🔙Orqaga",'callback_data'=>'chan']],
]
])
]);
file_put_contents("viki/$chat_id2.step","setchannel");
}else{
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"⚠️Faqat adminlar uchun!",
]);
}
}

$step1 = file_get_contents("viki/$chat_id.step");
if($step1 == "setchannel"){
$gett = bot('GetChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get == "creator" or $get == "administrator"){
if ($cty == "group" or $cty == "supergroup"){
$adm = bot('getChatAdministrators', [
'chat_id' => $text1,
]);
$adok = $adm->ok;
if ($adok) {
if(mb_stripos($text1,"@")!== false){
bot('sendmessage',[
 'chat_id'=>$chat_id,
'parse_mode'=>"html",
 'text'=>"✅<b>Kanal sozlandi. Endi guruh a'zolari</b> $text1 <b>kanaliga a'zo bo'lmaguncha yoza olishmaydi!</b>",
'reply_to_message_id'=>$mid,
]);
file_put_contents("viki/$chat_id.channel",$text1);
unlink("viki/$chat_id.step");
}else{
bot ('SendMessage', [
'chat_id'=> $chat_id,
'parse_mode'=>"markdown",
'text'=>"📛*Faqat kanal userini yuboring!*",
]);
}
}else{
bot ('SendMessage', [
'chat_id'=> $chat_id,
'parse_mode'=>"markdown",
'text'=>"📛*Bot yoki siz kanalda admin emassiz!*",
'reply_to_message_id'=> $mid,
]);
}
}
}
}

if(isset($update) and $Schan == "true"){
if ($cty == "group" or $cty == "supergroup"){
$channel = file_get_contents("viki/$chat_id.channel");
if ($channel == null){
$channel = "@Adabiyot_va_ona_tili";
}
$us = bot('getchat', [
'chat_id'=> $channel,
]);
$user = $us->result->username;
$tit = $us->result->title;
$gett = bot('GetChatMember', [
'chat_id'=> $channel,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get== "member" or $get== "creator" or $get== "administrator"){
}else{
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔵<b>Kechirasiz,</b> <a href='tg://user?id=$fadmin'>$name</a> <code>$title</code> <b>guruhida yozish uchun</b> @$user <b>kanaliga a'zo bo'lishingiz kerak!</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>$tit, 'url'=>"https://t.me/".$user]],
]
])
]);
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$mid,
]);
}
}
}

if(isset($text1)){
$avto = file_get_contents("avto/$chat_id");
if($avto){
}else{
$avtob = ["avto"=>"true",];
file_put_contents("avto/$chat_id",json_encode($avtob));
}
}

$avtob = json_decode(file_get_contents("avto/$chat_id"),true);
$Savto = $avtob["avto"];


if ($data == "avto"){
$gett = bot('getChatMember', [
'chat_id' => $chat_id2,
'user_id' => $fadmin2,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
$avtob = json_decode(file_get_contents("avto/$chat_id2"),true);
$avtoa = $avtob["avto"];
if($avtoa == "false"){
$avtoa = "☑️O'chirilgan";
}else{
$avtoa = "✅Yoqilgan";
}
bot ('EditMessageText', [
'chat_id'=> $chat_id2,
'message_id'=> $message_id2,
'text'=>"<b>Avto admin tizimiga xush kelibsiz bu tizim orqali siz guruhga yangi a'zo qo'shgan foydalanuvchini guruhga avtomatik admin qilishingiz mumkin nechta foydalanuvchi qo'shsa admin bo'lishini ham albatta siz belgilaysiz</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"👨🏻‍💻Avto tizim",'callback_data'=>"null"],['text'=>"$avtoa",'callback_data'=>"V()avto"],],
[['text'=>"🔏Sozlash",'callback_data'=>"avtoset"],['text'=>"🔙Orqaga",'callback_data'=>"panel_back"]]
]
])
]);
}
}

mkdir("avto");

$callback = $update->callback_query;
$dataa = $callback->data;
$dataa = explode("()",$dataa);
if($dataa[0] == "V"){
$gett = bot('getChatMember', [
'chat_id' => $chat_id2,
'user_id' => $fadmin2,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
$gets = bot("getChat",[
"chat_id"=>"$chat_id2",
]);
$title = $gets->result->title;
$avtob = json_decode(file_get_contents("avto/$chat_id2"),true);
if($avtob["$dataa[1]"] == "true"){
$input = "false";
}else{
$input = "true";
}
$avtob["$dataa[1]"] = $input;
file_put_contents("avto/$chat_id2",json_encode($avtob));
$avtob = json_decode(file_get_contents("avto/$chat_id2"),true);
$avtoa = $avtob["avto"];
if($avtoa == "false"){
$avtoa = "☑️O'chirilgan";
}else{
$avtoa = "✅Yoqilgan";
}
bot('editMessageText', [
'chat_id'=> $chat_id2,
'message_id'=> $message_id2,
'text'=>"<b>Avto admin tizimiga xush kelibsiz bu tizim orqali siz guruhga yangi a'zo qo'shgan foydalanuvchini guruhga avtomatik admin qilishingiz mumkin nechta foydalanuvchi qo'shsa admin bo'lishini ham albatta siz belgilaysiz</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"👨🏻‍💻Avto tizim",'callback_data'=>"null"],['text'=>"$avtoa",'callback_data'=>"V()avto"],],
[['text'=>"🔏Sozlash",'callback_data'=>"avtoset"],['text'=>"🔙Orqaga",'callback_data'=>"panel_back"]]
]
])
]);
}
}

if ($data == "avtoset"){
$gett = bot('getChatMember', [
'chat_id' => $chat_id2,
'user_id' => $fadmin2,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
bot ('EditMessageText', [
'chat_id'=> $chat_id2,
'message_id'=> $message_id2,
'text'=>"<b>Nechta odam qo'shsa avtomatik admin qilishni xoxlaysiz:</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"10",'callback_data'=>"son_10"],['text'=>"20",'callback_data'=>"son_20"],],
[['text'=>"30",'callback_data'=>"son_30"],['text'=>"40",'callback_data'=>"son_40"],],
[['text'=>"50",'callback_data'=>"son_50"],['text'=>"60",'callback_data'=>"son_60"],],
[['text'=>"70",'callback_data'=>"son_70"],['text'=>"80",'callback_data'=>"son_80"],],
[['text'=>"90",'callback_data'=>"son_90"],['text'=>"100",'callback_data'=>"son_100"],],
[['text'=>"🔙Orqaga",'callback_data'=>"avto"],['text'=>"🗑Menu yopish",'callback_data'=>"exit"],],
]
])
]);
}
}

if ($data == "null"){
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=> "❎Bu bo'lim o'zgarmaydi.!",
'show_alert'=>false,
]);
}

if (mb_stripos($data,"son")!==false){
$gett = bot('getChatMember', [
'chat_id' => $chat_id2,
'user_id' => $fadmin2,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
$ex = explode("_", $data);
$son = $ex[1];
file_put_contents("panel/$chat_id2.son","$son");
$soni = file_get_contents("panel/$chat_id2.son");
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=> "Avto tizim sozlandi guruhga $soni odam qo'shgan admin bo'ladi",
       'show_alert'=>true,
        ]);
bot ('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=> $message_id2,
'text'=>"<b>Salom,</b> <a href='tg://user?id=$fadmin2'>$name2</a> <b>quyidagi tugmalar yordamida botni boshqaring!</b>",
'parse_mode'=>"html",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"🛡Media sozlash",'callback_data'=>"sozlash"],['text'=>"📄Guruh haqida",'callback_data'=>"haqida"]],
[['text'=>"👨🏻‍💻Adminlar",'callback_data'=>"adminlar"],['text'=>"⛓Guruh havolasi",'callback_data'=>"havola"]],
[['text'=>"🤖Avto admin",'callback_data'=>"avto"],['text'=>"📛Majburiy a'zolik",'callback_data'=>"chan"]],
[['text'=>"🗑Menu yopish",'callback_data'=>"exit"]]
]
])
]);
}
}

if(isset($text1)){
$get = file_get_contents("panel/$chat_id");
if($get){
}else{
$baza = [
"salom"=>"true",
"link"=>"true",
"chats"=>"true",
"stiker"=>"true",
"audio"=>"true",
"voice"=>"true",
"photo"=>"true",
"video"=>"true",
"fayl"=>"true",
"kirish"=>"true",
"game"=>"true",
"location"=>"true",
"kontakt"=>"true",
"giflar"=>"true",
"bots"=>"true",
"forward"=>"true",
"selfi"=>"true",
];
file_put_contents("panel/$chat_id",json_encode($baza));
}
}

$baza = json_decode(file_get_contents("panel/$chat_id"),true);
$Ssalom = $baza["salom"];
$Slink = $baza["link"];
$Schats = $baza["chats"];
$Sstiker = $baza["stiker"];
$Saudio  = $baza["audio"];
$Svoice = $baza["voice"];
$Svideo = $baza["video"];
$Slocation = $baza["location"];
$Sgame  = $baza["game"];
$Skontakt = $baza["kontakt"];
$Skirish = $baza["kirish"];
$Sphoto = $baza["photo"];
$Sfayl = $baza["fayl"];
$Sgif = $baza["giflar"];
$Sbots = $baza["bots"];
$Sforward = $baza["forward"];
$Sselfi = $baza["selfi"];

$adminlist = file_get_contents("viki/adminlar/$chat_id");
$sons = file_get_contents("panel/$chat_id.son");
if(isset($update) and $Savto == "true"){
if ($new_chat_members){
if (mb_stripos($adminlist, $fadmin)!==false){
bot ('SendMessage', [
'chat_id'=> $chat_id,
'parse_mode'=>"markdown",
'text'=>"*Siz allaqachon admin bo'lgansiz!*",
]);
}else{
$war=file_get_contents("warn.dat");
$jazo="$war\n$chat_id=$fadmin";
file_put_contents("warn.dat",$jazo);
$war=file_get_contents("warn.dat");
$soni="$chat_id=$fadmin";
 $str=substr_count($war,"$soni");
if($str=="$sons"){
$rep=str_replace($soni,"","$war");
file_put_contents("warn.dat",$rep);
file_put_contents("viki/adminlar/$chat_id", $fadmin);
bot('promoteChatmember',[
      'chat_id'=>$chat_id,
      'user_id'=>$fadmin,
      'can_change_info'=>true,
      'can_post_messages'=>false,
      'can_edit_messages'=>false,
      'can_delete_messages'=>true,
      'can_invite_users'=>true,
      'can_restrict_members'=>true,
      'can_pin_messages'=>true,
      'can_promote_members'=>false
   ]);
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"<a href='tg://user?id=$fadmin'>$name</a> <b>guruhga $sons ta a'zo qo'shdi va guruh adminga aylandi</b>",
        'parse_mode'=>'html',
    ]);
}elseif($str<"$sons"){
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"👍<a href='tg://user?id=$fadmin'>$name</a> <b>guruhga yangi a'zo taklif qildi va +1ballga ega bo'ldi agar ballar soni $sons taga yetsa avtomatik adminlik huquqi beriladi.
ℹJami ballar soni: $str</b>",
        'parse_mode'=>'html',
    ]);
}
}
}
}

mkdir("panel");

$fadmin2 = $update->callback_query->from->id;
$imid = $callback->inline_message_id;
if($data == "media"){
$gett2 = bot('getChatMember', [
'chat_id'=> $chat_id2,
'user_id'=> $fadmin2,
]);
$get2 = $gett2->result->status;
if($get2 =="administrator" or $get2 == "creator"){
$baza = json_decode(file_get_contents("panel/$chat_id2"),true);
$gets = bot("getChat",[
"chat_id"=>"$chat_id2",
]);
$title = $gets->result->title;
$username = $gets->username;
$salom = $baza["salom"];
if($salom == "false"){
$salom = "☑️Taqiqlangan";
}else{
$salom = "✅Ruhsat etilgan";
}
$link = $baza["link"];
if($link == "false"){
$link = "☑️Taqiqlangan";
}else{
$link = "✅Ruhsat etilgan";
}
$chats = $baza["chats"];
if($chats == "false"){
$chats = "☑️Taqiqlangan";
}else{
$chats = "✅Ruhsat etilgan";
}
$stiker = $baza["stiker"];
if($stiker == "false"){
$stiker = "☑️Taqiqlangan";
}else{
$stiker = "✅Ruhsat etilgan";
}
$audio = $baza["audio"];
if($audio == "false"){
$audio = "☑️Taqiqlangan";
}else{
$audio = "✅Ruhsat etilgan";
}
$voice = $baza["voice"];
if($voice == "false"){
$voice = "☑️Taqiqlangan";
}else{
$voice = "✅Ruhsat etilgan";
}
$photo = $baza["photo"];
if($photo == "false"){
$photo = "☑️Taqiqlangan";
}else{
$photo = "✅Ruhsat etilgan";
}
$video = $baza["video"];
if($video == "false"){
$video = "☑️Taqiqlangan";
}else{
$video = "✅Ruhsat etilgan";
}
$fayl = $baza["fayl"];
if($fayl == "false"){
$fayl = "☑️Taqiqlangan";
}else{
$fayl = "✅Ruhsat etilgan";
}
$kirish = $baza["kirish"];
if($kirish == "false"){
$kirish = "☑️Taqiqlangan";
}else{
$kirish = "✅Ruhsat etilgan";
}
$location = $baza["location"];
if($location == "false"){
$location = "☑️Taqiqlangan";
}else{
$location = "✅Ruhsat etilgan";
}
$game = $baza["game"];
if($game == "false"){
$game = "☑️Taqiqlangan";
}else{
$game = "✅Ruhsat etilgan";
}
$kontakt = $baza["kontakt"];
if($kontakt == "false"){
$kontakt = "☑️Taqiqlangan";
}else{
$kontakt = "✅Ruhsat etilgan";
}
$gif = $baza["giflar"];
if($gif == "false"){
$gif = "☑️Taqiqlangan";
}else{
$gif = "✅Ruhsat etilgan";
}
$bots = $baza["bots"];
if($bots == "false"){
$bots = "☑️Taqiqlangan";
}else{
$bots = "✅Ruhsat etilgan";
}
$forward = $baza["forward"];
if($forward == "false"){
$forward = "☑️Taqiqlangan";
}else{
$forward = "✅Ruhsat etilgan";
}
$selfi = $baza["selfi"];
if($selfi == "false"){
$selfi = "☑️Taqiqlangan";
}else{
$selfi = "✅Ruhsat etilgan";
}
bot('editmessagetext', [
'chat_id'=>$chat_id2,
'message_id'=> $message_id2,
'text'=>"<a href='https://t.me/$username'>$title</a> <b>guruhini sozlash uchun quyidagi tugmalardan foydalaning:👇</b>
✅<b>Ruhsat etilgan
☑Taqiqlangan</b>",
'parse_mode'=>'html',
'inline_message_id'=>$imid,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["callback_data"=>"null","text"=>"📂Fayllar"],["callback_data"=>"M()fayl","text"=>"$fayl"],],
[["callback_data"=>"null","text"=>"😊Salomlashish"],["callback_data"=>"M()salom","text"=>"$salom"],],
[["callback_data"=>"null","text"=>"ℹLinklar"],["callback_data"=>"M()link","text"=>"$link"],],
[["callback_data"=>"null","text"=>"📢Suhbatlashish"],["callback_data"=>"M()chats","text"=>"$chats"],],
[["callback_data"=>"null","text"=>"✨Rasmlar"],["callback_data"=>"M()photo","text"=>"$photo"],],
[["callback_data"=>"null","text"=>"⛺Giflar"],["callback_data"=>"M()giflar","text"=>"$gif"],],
[["callback_data"=>"null","text"=>"🎧Musiqalar"],["callback_data"=>"M()audio","text"=>"$audio"],],
[["callback_data"=>"null","text"=>"🎤Goloslar"],["callback_data"=>"M()voice","text"=>"$voice"],],
[["callback_data"=>"null","text"=>"🎥Videolar"],["callback_data"=>"M()video","text"=>"$video"],],
[["callback_data"=>"null","text"=>"🎭Stickerlar"],["callback_data"=>"M()stiker","text"=>"$stiker"],],
[["callback_data"=>"null","text"=>"🎮O'yinlar"],["callback_data"=>"M()game","text"=>"$game"],],
[["callback_data"=>"null","text"=>"🏠Manzillar"],["callback_data"=>"M()location","text"=>"$location"],],
[["callback_data"=>"null","text"=>"👤Kontaktlar"],["callback_data"=>"M()kontakt","text"=>"$kontakt"],],
[["callback_data"=>"null","text"=>"📄Servis xabarlar"],["callback_data"=>"M()kirish","text"=>"$kirish"],],
[["callback_data"=>"null","text"=>"👷Botlar"],["callback_data"=>"M()bots","text"=>"$bots"],],
[["callback_data"=>"null","text"=>"➡Forwardlar"],["callback_data"=>"M()forward","text"=>"$forward"],],
[["callback_data"=>"null","text"=>"📹Video selfi"],["callback_data"=>"M()selfi","text"=>"$selfi"],],
[["callback_data"=>"panel_plus","text"=>"↗ Qo'shimcha sozlamalar"],],
[["callback_data"=>"panel_back","text"=>"🔙Orqaga"],],
]
]),
]);
}else{
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"👷Faqat adminlar uchun",
'show_alert'=>true,
]);
}
}

$callback = $update->callback_query;
$dataa = $callback->data;
$dataa = explode("()",$dataa);
if($dataa[0] == "M"){
$cid = $callback->from->id;
$mid = $callback->message->message_id;
$imid = $callback->inline_message_id;
$gett2 = bot('getChatMember', [
'chat_id'=> $chat_id2,
'user_id'=> $fadmin2,
]);
$get2 = $gett2->result->status;
if($get2 =="administrator" or $get2 == "creator"){
$gets = bot("getChat",[
"chat_id"=>"$chat_id2",
]);
$title = $gets->result->title;
$baza = json_decode(file_get_contents("panel/$chat_id2"),true);
if($baza["$dataa[1]"] == "true"){
$input = "false";
}else{
$input = "true";
}
$baza["$dataa[1]"] = $input;
file_put_contents("panel/$chat_id2",json_encode($baza));
$baza = json_decode(file_get_contents("panel/$chat_id2"),true);
$salom = $baza["salom"];
if($salom == "false"){
$salom = "☑️Taqiqlangan";
}else{
$salom = "✅Ruhsat etilgan";
}
$link = $baza["link"];
if($link == "false"){
$link = "☑️Taqiqlangan";
}else{
$link = "✅Ruhsat etilgan";
}
$chats = $baza["chats"];
if($chats == "false"){
$chats = "☑️Taqiqlangan";
}else{
$chats = "✅Ruhsat etilgan";
}
$stiker = $baza["stiker"];
if($stiker == "false"){
$stiker = "☑️Taqiqlangan";
}else{
$stiker = "✅Ruhsat etilgan";
}
$audio = $baza["audio"];
if($audio == "false"){
$audio = "☑️Taqiqlangan";
}else{
$audio = "✅Ruhsat etilgan";
}
$voice = $baza["voice"];
if($voice == "false"){
$voice = "☑️Taqiqlangan";
}else{
$voice = "✅Ruhsat etilgan";
}
$photo = $baza["photo"];
if($photo == "false"){
$photo = "☑️Taqiqlangan";
}else{
$photo = "✅Ruhsat etilgan";
}
$video = $baza["video"];
if($video == "false"){
$video = "☑️Taqiqlangan";
}else{
$video = "✅Ruhsat etilgan";
}
$fayl = $baza["fayl"];
if($fayl == "false"){
$fayl = "☑️Taqiqlangan";
}else{
$fayl = "✅Ruhsat etilgan";
}
$kirish = $baza["kirish"];
if($kirish == "false"){
$kirish = "☑️Taqiqlangan";
}else{
$kirish = "✅Ruhsat etilgan";
}
$location = $baza["location"];
if($location == "false"){
$location = "☑️Taqiqlangan";
}else{
$location = "✅Ruhsat etilgan";
}
$game = $baza["game"];
if($game == "false"){
$game = "☑️Taqiqlangan";
}else{
$game = "✅Ruhsat etilgan";
}
$kontakt = $baza["kontakt"];
if($kontakt == "false"){
$kontakt = "☑️Taqiqlangan";
}else{
$kontakt = "✅Ruhsat etilgan";
}
$gif = $baza["giflar"];
if($gif == "false"){
$gif = "☑️Taqiqlangan";
}else{
$gif = "✅Ruhsat etilgan";
}
$bots = $baza["bots"];
if($bots == "false"){
$bots = "☑️Taqiqlangan";
}else{
$bots = "✅Ruhsat etilgan";
}
$forward = $baza["forward"];
if($forward == "false"){
$forward = "☑️Taqiqlangan";
}else{
$forward = "✅Ruhsat etilgan";
}
$selfi = $baza["selfi"];
if($selfi == "false"){
$selfi = "☑️Taqiqlangan";
}else{
$selfi = "✅Ruhsat etilgan";
}
bot('editMessageText', [
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"<a href='https://t.me/$username'>$title</a> <b>guruhini sozlash uchun quyidagi tugmalardan foydalaning:👇</b>
✅<b>Ruhsat etilgan
☑Taqiqlangan</b>",
'parse_mode'=>'html',
'inline_message_id'=>$imid,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["callback_data"=>"null","text"=>"📂Fayllar"],["callback_data"=>"M()fayl","text"=>"$fayl"],],
[["callback_data"=>"null","text"=>"😊Salomlashish"],["callback_data"=>"M()salom","text"=>"$salom"],],
[["callback_data"=>"null","text"=>"ℹLinklar"],["callback_data"=>"M()link","text"=>"$link"],],
[["callback_data"=>"null","text"=>"📢Suhbatlashish"],["callback_data"=>"M()chats","text"=>"$chats"],],
[["callback_data"=>"null","text"=>"✨Rasmlar"],["callback_data"=>"M()photo","text"=>"$photo"],],
[["callback_data"=>"null","text"=>"⛺Giflar"],["callback_data"=>"M()giflar","text"=>"$gif"],],
[["callback_data"=>"null","text"=>"🎧Musiqalar"],["callback_data"=>"M()audio","text"=>"$audio"],],
[["callback_data"=>"null","text"=>"🎤Goloslar"],["callback_data"=>"M()voice","text"=>"$voice"],],
[["callback_data"=>"null","text"=>"🎥Videolar"],["callback_data"=>"M()video","text"=>"$video"],],
[["callback_data"=>"null","text"=>"🎭Stickerlar"],["callback_data"=>"M()stiker","text"=>"$stiker"],],
[["callback_data"=>"null","text"=>"🎮O'yinlar"],["callback_data"=>"M()game","text"=>"$game"],],
[["callback_data"=>"null","text"=>"🏠Manzillar"],["callback_data"=>"M()location","text"=>"$location"],],
[["callback_data"=>"null","text"=>"👤Kontaktlar"],["callback_data"=>"M()kontakt","text"=>"$kontakt"],],
[["callback_data"=>"null","text"=>"📑Servis xabarlar"],["callback_data"=>"M()kirish","text"=>"$kirish"],],
[["callback_data"=>"null","text"=>"👷Botlar"],["callback_data"=>"M()bots","text"=>"$bots"],],
[["callback_data"=>"null","text"=>"➡Forwardlar"],["callback_data"=>"M()forward","text"=>"$forward"],],
[["callback_data"=>"null","text"=>"📹Video selfi"],["callback_data"=>"M()selfi","text"=>"$selfi"],],
[["callback_data"=>"panel_plus","text"=>"↗ Qo'shimcha sozlamalar"],],
[["callback_data"=>"panel_back","text"=>"🔙Orqaga"],],
]
]),
]);
}else{
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"👷Faqat adminlar uchun",
'show_alert'=>true,
]);
}
}

if ($text1 == "/sozlama" or $text1 == "/sozlama@Valijon_aka_robot"){
if ($cty == "group" or $cty == "supergroup"){
$gett = bot('getChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
$us = bot('getChatMembersCount',[
'chat_id'=>$chat_id,
]);
$count = $us->result;
if ($count >= 30){
bot ('SendMessage', [
'chat_id'=>$chat_id,
'text'=>"<b>Salom,</b> <a href='tg://user?id=$fadmin'>$name</a> <b>quyidagi tugmalar yordamida botni boshqaring!</b>",
'parse_mode'=>"html",
'reply_to_message_id'=> $mid,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"🛡Media sozlash",'callback_data'=>"sozlash"],['text'=>"📄Guruh haqida",'callback_data'=>"haqida"]],
[['text'=>"👨🏻‍💻Adminlar",'callback_data'=>"adminlar"],['text'=>"⛓Guruh havolasi",'callback_data'=>"havola"]],
[['text'=>"🤖Avto admin",'callback_data'=>"avto"],['text'=>"📛Majburiy a'zolik",'callback_data'=>"chan"]],
[['text'=>"🗑Menu yopish",'callback_data'=>"exit"]]
]
])
]);
}else{
bot ('deleteMessage', [
'chat_id'=> $chat_id,
'message_id'=> $mid,
]);
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"*📛Kechirasiz ushbu buyruqdan foydalanish uchun guruhda kamida 30ta a'zo bo'lishi kerak iltimos xatoni to'g'irlab qayta urunib ko'ring!*",
'parse_mode'=>"markdown",
]);
}
}
}
}

if ($data == "sozlash"){
$gett1 = bot('getChatMember', [
'chat_id'=> $chat_id2,
'user_id'=> $fadmin2,
]);
$get1 = $gett1->result->status;
if($get1 =="administrator" or $get1 == "creator"){
bot ('editmessagetext', [
'chat_id'=>$chat_id2,
'message_id'=> $message_id2,
'text'=>"<b>Kerakli bo'limni tanlang:</b>",
'parse_mode'=>"html",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"💾Media sozlamalari",'callback_data'=>"media"]],
[['text'=>"➡Qo'shimcha sozlamalar",'callback_data'=>"qoshimcha"]],
[['text'=>"🔙 Orqaga",'callback_data'=>"panel_back"], ['text'=>"🗑Menu yopish",'callback_data'=>"exit"]]
]
])
]);
}
}


if ($data == "panel_back"){
$gett1 = bot('getChatMember', [
'chat_id'=> $chat_id2,
'user_id'=> $fadmin2,
]);
$get1 = $gett1->result->status;
if($get1 =="administrator" or $get1 == "creator"){
bot ('editmessagetext', [
'chat_id'=>$chat_id2,
'message_id'=> $message_id2,
'text'=>"<b>Salom,</b> <a href='tg://user?id=$fadmin2'>$name2</a> <b>quyidagi tugmalar yordamida botni boshqaring!</b>",
'parse_mode'=>"html",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"🛡Media sozlash",'callback_data'=>"sozlash"],['text'=>"📄Guruh haqida",'callback_data'=>"haqida"]],
[['text'=>"👨🏻‍💻Adminlar",'callback_data'=>"adminlar"],['text'=>"⛓Guruh havolasi",'callback_data'=>"havola"]],
[['text'=>"🤖Avto admin",'callback_data'=>"avto"],['text'=>"📛Majburiy a'zolik",'callback_data'=>"chan"]],
[['text'=>"🗑Menu yopish",'callback_data'=>"exit"]]
]
])
]);
}
}

if ($data == "haqida"){
$gett1 = bot('getChatMember', [
'chat_id'=> $chat_id2,
'user_id'=> $fadmin2,
]);
$get1 = $gett1->result->status;
if($get1 =="administrator" or $get1 == "creator"){
$user = bot("getchat",[
'chat_id'=>$chat_id2,
]);
$type = $user->result->type;
$id = $user->result->id;
$description1 = $user->result->description;
$title1 = $user->result->title;
$username1 = $user->result->username;
$us = bot('getChatMembersCount',[
'chat_id'=>$chat_id2,
]);
$count = $us->result;
bot ('EditMessageText', [
'chat_id'=> $chat_id2,
'message_id'=> $message_id2,
'parse_mode'=>"markdown",
'text'=>"*Guruh nomi:* `$title1`
*Guruh useri:* [@$username1]
*A'zolar soni:* `$count`
*Guruh ID:* `$id`
*Guruh infosi:* `$description1`",
   'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"🛡Media sozlash",'callback_data'=>"sozlash"],['text'=>"📄Guruh haqida",'callback_data'=>"haqida"]],
[['text'=>"👨🏻‍💻Adminlar",'callback_data'=>"adminlar"],['text'=>"⛓Guruh havolasi",'callback_data'=>"havola"]],
[['text'=>"🤖Avto admin",'callback_data'=>"avto"],['text'=>"🗑Menu yopish",'callback_data'=>"exit"]]
]
])
]);
}
}

if($data=="havola"){
$gett1 = bot('getChatMember', [
'chat_id'=> $chat_id2,
'user_id'=> $fadmin2,
]);
$get1 = $gett1->result->status;
if($get1 =="administrator" or $get1 == "creator"){
$getlink = file_get_contents("https://api.telegram.org/bot$token/exportChatInviteLink?chat_id=$chat_id2");
$jsonlink = json_decode($getlink, true);
$getlinkde = $jsonlink['result'];
bot('editmessagetext',[
   'chat_id'=>$chat_id2,
  'message_id'=> $message_id2,
  'parse_mode'=>"markdown",
   'text'=>"🔖*Guruh rasmiy havolasi:*
[$getlinkde]",
   'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"🛡Media sozlash",'callback_data'=>"sozlash"],['text'=>"📄Guruh haqida",'callback_data'=>"haqida"]],
[['text'=>"👨🏻‍💻Adminlar",'callback_data'=>"adminlar"],['text'=>"⛓Guruh havolasi",'callback_data'=>"havola"]],
[['text'=>"🤖Avto admin",'callback_data'=>"avto"],['text'=>"🗑Menu yopish",'callback_data'=>"exit"]]
]
])
]);
}
}

if($text1 == "/silent" or $text1 == "silent" or $text1 == "/silent@Valijon_aka_robot"){
$gett = bot('getChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
 bot('restrictChatMember',[
   'user_id'=>$id1,   
   'chat_id'=>$chat_id,
   'can_post_messages'=>false,
         ]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$repname <code>$title</code><b> guruhida butun umrga yozishdan mahrum qilindi
👤Foydalanuvchi haqida ma'lumot:</b>
🔸<b>Nomi:</b> $repname
🔹<b>Useri:</b> @$repuser
💥<b>ID:</b> $id1",
'parse_mode'=>"html",
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
     [['text'=>"$repname", 'url'=>"https://telegram.me/$repuser"]],
[['text'=>"ℹ Kanalimiz",'url'=>"https://telegram.me/Adabiyot_va_ona_tili"]]
    ]
    ])
]);
}
}

if($text1  == "/unsilent" or $text1 == "unsilent" or $text1  == "/unsilent@Valijon_aka_robot"){
$gett = bot('getChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
 bot('restrictChatMember',[
   'user_id'=>$id1,   
   'chat_id'=>$chat_id,
   'can_post_messages'=>true,
   'can_add_web_page_previews'=>false,
   'can_send_other_messages'=>true,
   'can_send_media_messages'=>true,
         ]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$repname <code>$title</code><b> jazo olib tashlandi endi guruhda yozishi mumkin.
👤Foydalanuvchi haqida ma'lumot:</b>
🔸<b>Nomi:</b> $repname
🔹<b>Useri:</b> @$repuser
💥<b>ID:</b> $id1",
'parse_mode'=>"html",
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
[['text'=>"$repname", 'url'=>"https://telegram.me/$repuser"]],
[['text'=>"ℹKanalimiz",'url'=>"https://telegram.me/Adabiyot_va_ona_tili"]]
    ]
    ])
]);
}
}

if ($data == "adminlar"){
$up = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatAdministrators?chat_id=".$chat_id2),true);
  $result = $up['result'];
  foreach($result as $key=>$value){
    $found = $result[$key]['status'];
    if($found == "creator"){
      $owner = $result[$key]['user']['id'];
	  $owner2 = $result[$key]['user']['first_name'];
    }
if($found == "administrator"){
$innames = str_replace(['[',']'],'',$result[$key]['user']['first_name']);
$idilar = $result[$key]['user']['id'];
$msg1 = "$msg1"."\n 👨🏻‍💻 <a href='tg://user?id=$idilar'>$innames</a>";
  }
		 }
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=> $message_id2,
'text'=>"🛠<b>Yaratuvchi:</b> <a href='tg://user?id=$owner'>$owner2</a>
👥<b>Guruh adminlari :</b> $msg1",
'parse_mode'=>"html",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"🛡Media sozlash",'callback_data'=>"sozlash"],['text'=>"📄Guruh haqida",'callback_data'=>"haqida"]],
[['text'=>"👨🏻‍💻Adminlar",'callback_data'=>"adminlar"],['text'=>"⛓Guruh havolasi",'callback_data'=>"havola"]],
[['text'=>"🤖Avto admin",'callback_data'=>"avto"],['text'=>"🗑Menu yopish",'callback_data'=>"exit"]]
]
])
 ]);
}

if($text1=="/adminlar" or $text1 == "/adminlar@Valijon_aka_robot"){
  $up = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatAdministrators?chat_id=".$chat_id),true);
  $result = $up['result'];
  foreach($result as $key=>$value){
    $found = $result[$key]['status'];
    if($found == "creator"){
      $owner = $result[$key]['user']['id'];
	  $owner2 = $result[$key]['user']['first_name'];
    }
if($found == "administrator"){
$innames = str_replace(['[',']'],'',$result[$key]['user']['first_name']);
$idilar = $result[$key]['user']['id'];
$msg1 = "$msg1"."\n👨🏻‍💻<a href='tg://user?id=$idilar'>$innames</a>";
  }
		 }
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"👨‍💻<b>Guruh yaratuvchisi:</b> <a href='tg://user?id=$owner'>$owner2</a>
👥<b>Guruh adminlari:</b> $msg1",
'parse_mode'=>"html",
'reply_to_message_id'=>$mid,
 ]);
}

if($text1 == '/code' and $chat_id == $admin){
bot('sendDocument',[
'chat_id'=>$chat_id,
'document'=>new CURLFile(__FILE__),
'caption'=>"@Valijon_aka_robot *code*",
'parse_mode'=>"markdown",
'reply_to_message_id'=>$mid,
]);
}

if(isset($update) and $Skirish == "true"){
if($update->message->new_chat_member or $update->message->new_chat_photo or $update->message->new_chat_title or $update->message->left_chat_member or $update->message->pinned_message){
    bot('deleteMessage',[
        'chat_id'=>$chat_id,
        'message_id'=>$mid,
    ]);
}
}

if(isset($update) and $Sbots == "false"){
    if (($new_chat_members != NUll)&&($is_bot!=false)) {
$gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if($get =="member"){
   $vaqti = strtotime("+999999999999 minutes");
  bot('kickChatMember', [
      'chat_id' => $chat_id,
      'user_id' => $new_chat_members,
      'until_date'=> $vaqti,
  ]);
  bot('sendmessage', [
      'chat_id' => $chat_id,
      'text' => "👷Guruhga faqat adminlar bot qo'shishi mumkin!",
      'parse_mode' => 'html',
  ]);
}
}
}

if(isset($update) and $Slink == "false"){
if ((mb_stripos($text1,"http")!==false) or (mb_stripos($caption,"http")!==false) or (mb_stripos($performer,"http")!==false) or (mb_stripos($text1,"t.me")!==false) or (mb_stripos($text1,"telegram.me")!==false)){
$gett = bot('getChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=> $chat_id,
'message_id'=> $mid,
]);
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"⚠ <a href='tg://user?id=$fadmin'>$name</a> [$fadmin] kechirasiz bu guruhda reklama tashlash mumkin emas.",
'parse_mode'=>"html",
]);
}
}
}


if(isset($update) and $Sforward == "false"){
if ((isset($forward)!==false) or (isset($forward_ch)!==false)){
$gett = bot('getChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=> $chat_id,
'message_id'=> $mid,
]);
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"⚠<a href='tg://user?id=$fadmin'>$name</a> [$fadmin] kechirasiz bu guruhda forward qilish mumkin emas.",
'parse_mode'=>"html",
]);
}
}
}

if(isset($update) and $Sselfi == "false"){
if (isset($selfi1)!==false){
$gett = bot('getChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=> $chat_id,
'message_id'=> $mid,
]);
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"⚠<a href='tg://user?id=$fadmin'>$name</a> [$fadmin] kechirasiz bu guruhda video selfi tashlash mumkin emas.",
'parse_mode'=>"html",
]);
}
}
}

if(isset($update) and $Saudio == "false"){
if (isset($audio)!==false){
$gett = bot('getChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=> $chat_id,
'message_id'=> $mid,
]);
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"⚠<a href='tg://user?id=$fadmin'>$name</a> [$fadmin] kechirasiz bu guruhda musiqa tashlash mumkin emas.",
'parse_mode'=>"html",
]);
}
}
}

if(isset($update) and $Svoice == "false"){
if (isset($voice)!==false){
$gett = bot('getChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=> $chat_id,
'message_id'=> $mid,
]);
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"⚠<a href='tg://user?id=$fadmin'>$name</a> [$fadmin] kechirasiz bu guruhda ovozli xabar tashlash mumkin emas.",
'parse_mode'=>"html",
]);
}
}
}

if(isset($update) and $Svideo == "false"){
if (isset($video)!==false){
$gett = bot('getChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=> $chat_id,
'message_id'=> $mid,
]);
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"⚠<a href='tg://user?id=$fadmin'>$name</a> [$fadmin] kechirasiz bu guruhda video tashlash mumkin emas.",
'parse_mode'=>"html",
]);
}
}
}

if(isset($update) and $Sstiker == "false"){
if (isset($sticker)!==false){
$gett = bot('getChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=> $chat_id,
'message_id'=> $mid,
]);
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"⚠<a href='tg://user?id=$fadmin'>$name</a> [$fadmin] kechirasiz bu guruhda stiker tashlash mumkin emas.",
'parse_mode'=>"html",
]);
}
}
}

if(isset($update) and $Sgif == "false"){
if (isset($gif)!==false){
$gett = bot('getChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=> $chat_id,
'message_id'=> $mid,
]);
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"⚠<a href='tg://user?id=$fadmin'>$name</a> [$fadmin] kechirasiz bu guruhda gif tashlash mumkin emas.",
'parse_mode'=>"html",
]);
}
}
}

if(isset($update) and $Sfayl == "false"){
if (isset($doc)!==false){
$gett = bot('getChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=> $chat_id,
'message_id'=> $mid,
]);
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"⚠<a href='tg://user?id=$fadmin'>$name</a> [$fadmin] kechirasiz bu guruhda fayl tashlash mumkin emas.",
'parse_mode'=>"html",
]);
}
}
}

if(isset($update) and $Skontakt == "false"){
if (isset($contact)!==false){
$gett = bot('getChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=> $chat_id,
'message_id'=> $mid,
]);
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"⚠<a href='tg://user?id=$fadmin'>$name</a> [$fadmin] kechirasiz bu guruhda kontakt tashlash mumkin emas.",
'parse_mode'=>"html",
]);
}
}
}

if(isset($update) and $Slocation == "false"){
if (isset($location)!==false){
$gett = bot('getChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=> $chat_id,
'message_id'=> $mid,
]);
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"⚠<a href='tg://user?id=$fadmin'>$name</a> [$fadmin] kechirasiz bu guruhda manzil tashlash mumkin emas.",
'parse_mode'=>"html",
]);
}
}
}

if(isset($update) and $Sgame == "false"){
if (isset($game)!==false){
$gett = bot('getChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=> $chat_id,
'message_id'=> $mid,
]);
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"⚠<a href='tg://user?id=$fadmin'>$name</a> [$fadmin] kechirasiz bu guruhda o'yin o'ynash mumkin emas.",
'parse_mode'=>"html",
]);
}
}
}



if(isset($chpmesid) and (strtolower($chuser) == strtolower(str_replace("@","",$kanali)))){
unlink("news.dat");
file_put_contents("news.txt",$chpmesid);
$chm = file_get_contents("news.txt");
bot('forwardMessage', [
'chat_id'=>$admin,
'from_chat_id'=>$kanali,
'message_id'=>$chm,
]);
}

$soat = date('H:i:s', strtotime('5 hour'));
$bugun = date('d.m.y',strtotime('2 hour'));

$step = file_get_contents("stat/$chat_id.step");
$guruhlar = file_get_contents("stat/vagroup.list");
$userlar = file_get_contents("stat/vauser.list");
$kanallar = file_get_contents("stat/vakanal.list");
mkdir("warn");
mkdir("stat");

$us = bot('getChatMembersCount',[
'chat_id'=>$chat_id,
]);
$count = $us->result;

if(mb_stripos($text1,"/setinfo")!== false){
$newdec = str_replace("/setinfo","",$text1);
$gett = bot('getChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
bot('setChatDescription',[
'chat_id'=>$chat_id,
'description'=>$newdec,
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅Guruh sharhi o'zgartirildi hozirgi sharh:
`$newdec`",
'parse_mode'=>'markdown',
]);
}
}

$yangilar = file_get_contents("viki/yangilar.txt");



if(isset($update) and $Ssalom == "true"){
if ($new_chat_members) {
$wel = file_get_contents("viki/$chat_id.wel");
if (isset($wel) and !empty($wel)){
$ism = str_replace("{name}", $ismi, $wel);
$uid = str_replace("{id}", $new_chat_members, $ism);
$chatm = str_replace("{title}", $title, $uid);
$test = "$chatm";
       bot('sendmessage',[
       'chat_id'=>$chat_id,
       'text'=>$test,
       'parse_mode'=>'html',
     ]);
}else{
bot ('SendMessage', [
'chat_id'=> $chat_id,
'parse_mode'=>"html",
'text'=>"<b>Salom, </b> <a href='tg://user?id=$new_chat_members'>$ismi</a> <code>$title</code> <b>guruhiga xush kelibsiz</b>",
]);
    }
}
    }

if(isset($text1)){
  if($cty == "group" or $cty == "supergroup"){
    if(stripos($guruhlar,"$chat_id")!==false){
    }else{
 file_put_contents("stat/vagroup.list","$guruhlar\n$chat_id");
    }
  }else{
   $userlar = file_get_contents("stat/vauser.list");
   if(stripos($userlar,"$chat_id")!==false){
    }else{
 file_put_contents("stat/vauser.list","$userlar\n$chat_id");
   }
  }
}

if ($text1 == "/start" or $text1 == "/start@Valijon_aka_robot" or $text1 == "/sozlama" or $text1 == "/sozlama@Valijon_aka_robot"){
$gett = bot('getChatMember', [
'chat_id'=> $chat_id,
'user_id'=> $fadmin,
]);
$get = $gett->result->status;
if($get == "member"){
bot ('deleteMessage', [
'chat_id'=> $chat_id, 
'message_id'=> $mid,
]);
}
}

if ($text1 == "/start" or $text1 == "/start@Valijon_aka_robot" and $cty =="private"){
$chm = file_get_contents("news.txt");
bot('forwardMessage', [
'chat_id'=>$chat_id,
'from_chat_id'=>$kanali,
'message_id'=>$chm,
]);
bot  ('SendMessage', [
'chat_id'=> $chat_id,
'parse_mode'=>"html",
	'text'=>"👍<b>Salom,</b> $name botdan to'liq foydalanish uchun <b>ro'yxatdan o'tishingiz</b> kerak.

🤙🏻<b>Jinsingizni tasdiqlang:</b>",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard' => [
[['text'=>"👨🏻‍✈️Erkak",'callback_data'=>"jins_👨🏻‍✈️Erkak"],['text'=>"👩🏻‍✈️Ayol",'callback_data'=>"jins_👩🏻‍✈️Ayol"]]
]
]),
]);
}

mkdir("viki");

if (mb_stripos($data,"jins")!==false){
$ex = explode("_", $data);
file_put_contents("viki/$chat_id.jins","$ex[1]");
bot ('EditMessageText', [
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'parse_mode'=>"html",
'text'=>"👤<b>Yoshingizni kiriting:</b>",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard' => [
[['text'=>"10-15",'callback_data'=>"yosh_10-15"],['text'=>"16-20",'callback_data'=>"yosh_16-20"]],
[['text'=>"21-22",'callback_data'=>"yosh_21-22"],['text'=>"23+",'callback_data'=>"yosh_23+"]]
]
]),
]);
}

if (mb_stripos($data,"yosh")!==false){
$ex = explode("_", $data);
file_put_contents("viki/$chat_id.yosh","$ex[1]");
$jins = file_get_contents("viki/$chat_id.jins");
$yosh = file_get_contents("viki/$chat_id.yosh");
  if($lname2 == null){
  $lname2 = "🚫Mavjud emas";
  }
$user = "@$username2";
  if($user == null){
  $user = "🚫Mavjud emas";
  }
bot('EditMessageText', [
'chat_id'=> $chat_id2,
'message_id'=> $message_id2,
'text'=>"😉Salom, $name2!
😁Meni tanigan bo'lsangiz kerak mening ismim <b>Valijon</b> do'stlarim esa erkalab <b>Viki</b> deb chaqirishadi meni bunday chaqirishlari menga juda ham yoqadi!

😅Xullas men <b>guruhlarda ishlayman</b> meni guruhizga admin qiling men gruppani nazorat qilishni qiyivoraman!

Meni guruhlarga qo'shing😚",
'parse_mode'=>"html",
'disable_web_page_preview'=>true,
  'reply_markup'=>json_encode([   
   'inline_keyboard'=>[   
[['text'=>"ℹBuyruqlarim",'callback_data'=>"buyruq"],['text'=>"📊Statistikam",'callback_data'=>"stat"]],
[['text'=>"👷Kanalimiz",'url'=>"https://t.me/Adabiyot_va_ona_tili"],['text'=>"💎Qiziqarli",'callback_data'=>"dost"]],
[['text'=>"🆔Aniqlash",'switch_inline_query'=>"@"]],
[['text'=>"➡Guruhga qo'shish",'url'=>"telegram.me/Valijon_aka_robot?startgroup=new"]]
]
]),
]);
bot('SendMessage', [
'chat_id'=>"-1001206766771",
'text'=>"<b>Yoshi:</b> $yosh 
<b>Jinsi:</b> $jins
<b>Ismi:</b>  <a href='tg://user?id=$chat_id2'>$name2</a>
<b>Familiyasi:</b> $lname2
<b>Username:</b> @$username2
<b>ID:</b> $chat_id2",
'parse_mode'=>"html",
]);
}

if($data=="exit" ){
bot('deletemessage',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
 ]);
bot('answerCallbackQuery',[
'callback_query_id'=>$cqid,
'text'=>"🗑Menu yopildi",
]);
}

if ($data == "back"){
bot ('editMessageText', [
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"😉Salom, $name2!
😁Meni tanigan bo'lsangiz kerak mening ismim <b>Valijon</b> do'stlarim esa erkalab <b>Viki</b> deb chaqirishadi meni bunday chaqirishlari menga juda ham yoqadi!

😅Xullas men <b>guruhlarda ishlayman</b> meni guruhizga admin qiling men gruppani nazorat qilishni qiyivoraman!

Meni guruhlarga qo'shing😚",
'parse_mode'=>"html",
'inline_message_id'=>$imid,
'disable_web_page_preview'=>true,
  'reply_markup'=>json_encode([   
   'inline_keyboard'=>[   
[['text'=>"ℹBuyruqlarim",'callback_data'=>"buyruq"],['text'=>"📊Statistikam",'callback_data'=>"stat"]],
[['text'=>"👷Kanalimiz",'url'=>"https://t.me/Adabiyot_va_ona_tili"],['text'=>"💎Qiziqarli",'callback_data'=>"dost"]],
[['text'=>"🆔Aniqlash",'switch_inline_query'=>"@"]],
[['text'=>"➡Guruhga qo'shish",'url'=>"telegram.me/Valijon_aka_robot?startgroup=new"]]
]
]),
]);
}

if ($data == "buyruq"){
bot  ('EditMessageText', [
'chat_id'=> $chat_id2,
'message_id'=> $message_id2,
'text'=>"👷*Bot telegram tarmog'idagi barcha super guruhlarda o'z faoliyatini olib bora oladi va guruh yaratuvchisi yoki adminstratorlari uchun qulay buyruqlar bilan ishlamoqda. Hozirda ushbu bot telegram tarmog'ida juda ham ommalashdi va botdan foydalanuchilar yakdil tarzda o'sib bormoqda. Botdagi barcha buyruqlar:*

1) `/ro` - *Reply qilingan foydalanuvchini ovozsiz rejimiga tushirish*

2) `/unro` - *Reply qilingan foydalanuvcgini ovozsiz rejimdan olish*

3) `/kick` - *Guruh a'zosini guruhdan chiqarib yuborish*

4) `/ban` - *Foydalanuvchini guruhdan chiqarib yuborish bu bilan u guruhga qaytib kirolmaydi*

5) `/unban` - *Guruh a'zosini bandan olish*

6) `/warn` - *Foydalanuvchiga jazo berish*

7) `/nowarn` - *Barcha jazolarni olib tashlash*

8) `/mywarn` - *Jazolar sonini bilish*

9) `/text` - *Xabaringizni tahrirlab beraman*

10) `/admins` - *Foydalanuvchini guruhda admin qilaman*

11) `/setinfo va so'z` - *Guruh sharhini o'zgartiraman*

12) `/adminlar` - *Guruhdagi adminlar ro'yxati*

13) `/silent` - *Guruhda yozishdan bir umrga maxrum qilish*

14) `/unsilent` - *Bir umrga yozishdan maxrum qilingan jazoni olib tashlash*

15) `/sozlama` - *Botni turli tugmalar yordamida boshqarish va guruhga sozlash faqat adminda ishlaydi*

16) `/welcome va matn` - *Guruhga yangi kirganlar bilan salomlashish matnini o'rnatish*

*Salomlashish uchun kalit so'zlar:* 
`{name}` - Yangi kirgan a'zoni ismi bilan salomlashadi
`{id}` - Yangi kirgan a'zoni id raqamini oladi
`{title}` - Guruh nomini oladi

*Namuna:* `Salom, {name} bo'tam qalesan`

17) `/leave` - *Botni guruhdan chiqarib yuborish faqat adminda ishlaydi*

18) `/delphoto` - *Guruh rasmini olib tashlash*

19) `/msg` - *Guruhda yozilgan barcha xabarlar sonini bilish*

*Qo'llab-quvvatlash markazi:* [@Telba_554]",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
  'reply_markup'=>json_encode([   
   'inline_keyboard'=>[   
[['text'=>"🔙Orqaga",'callback_data'=>"back"]]
]
]),
]);
}

if ($data == "stat"){
$gr = substr_count($guruhlar,"\n"); 
$us = substr_count($userlar,"\n"); 
$obsh = $gr + $us;
bot ('EditMessageText', [
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
   'text'=> "ℹFoydalanuvchilar:
🌏Umumiy: *$obsh*
👤Userlar: *$us*
👥Guruhlar: *$gr*
💪[@Telba_554]

$bugun $soat",
'parse_mode' => 'markdown',
'disable_web_page_preview'=>true,
  'reply_markup'=>json_encode([   
   'inline_keyboard'=>[   
[['text'=>"♻Yangilash",'callback_data'=>"stat"]],
[['text'=>"🔙Orqaga",'callback_data'=>"back"]]
]
]),
]);
}

if ($data == "dost"){
bot ('EditMessageText', [
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"💎*Qo'shimcha buyruqlar:*

*/ism va ism* - Ismingiz ma'nosini aytib beraman

*/logo va so'z* - Chiroyli usulda turli xil logo yasayman

*/keep va so'z* - Chiroyli usulda logo yasash

*/love va so'z* - Lovega yozish 

*/url va so'z* - Share ssilka tayyorlash

*/screen va sayt* - Sayt
Saytni rasmga olish

*/tasix va sayt* - Saytni tas-ix ga tekshirish

*/getpro va raqam* - Belgilangan raqamdagi profilingiz rasmini olib beradi 

*/mark va matn* - Matnni markdown rejimiga o'zgartirish

*/html va matn* - Matnni html rejimiga o'tkazish

*/ru va matn* - Matnni rus tiliga tarjima qilish

*/en va matn* - Matnni ingliz tiliga tarjima qilish

*/uz va matn* - Matnni uzbek tiliga tarjima qilish

*Bot matematik amallarni ham bajara oladi namuna:* `2+2`

*Qo'llab-quvvatlash markazi:* [@Telba_554]",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
  'reply_markup'=>json_encode([   
   'inline_keyboard'=>[   
[['text'=>"🔙Orqaga",'callback_data'=>"back"]]
]
]),
]);
}

if (mb_stripos($text1,"/uz")!==false){
$uz= str_replace("/uz","",$text1);
$uzb=json_decode(file_get_contents("https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20160119T111342Z.fd6bf13b3590838f.6ce9d8cca4672f0ed24f649c1b502789c9f4687a&format=plain&lang=uz&text=".urlencode($uz)))->text[0];
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"🇺🇿Uzbek: *$uzb*\n\n🔁Tarjimon: [@Valijon_aka_robot]",
'parse_mode'=>"markdown",
'reply_to_message_id'=> $mid,
]);
}

if (mb_stripos($text1,"/en")!==false){
$en= str_replace("/en","",$text1);
$english=json_decode(file_get_contents("https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20160119T111342Z.fd6bf13b3590838f.6ce9d8cca4672f0ed24f649c1b502789c9f4687a&format=plain&lang=en&text=".urlencode($en)))->text[0];
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"🇺🇸English: *$english*\n\n🔁Translate: [@Valijon_aka_robot]",
'parse_mode'=>"markdown",
'reply_to_message_id'=> $mid,
]);
}

if (mb_stripos($text1,"/ru")!==false){
$ru= str_replace("/ru","",$text1);
$rus=json_decode(file_get_contents("https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20160119T111342Z.fd6bf13b3590838f.6ce9d8cca4672f0ed24f649c1b502789c9f4687a&format=plain&lang=ru&text=".urlencode($ru)))->text[0];
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"🇷🇺Русский: *$rus*\n\n🔁Переводчик: [@Valijon_aka_robot]",
'parse_mode'=>"markdown",
'reply_to_message_id'=> $mid,
]);
}


if(mb_stripos($text1,"/url") !== false){ 
$ex = explode(" ",$text1);
$Adabiyot_va_ona_tili = $ex[1];
bot('SendMessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"markdown",
'text'=>"♻*Marhamat siz uchun share ssilka tayyor*

➡ `http://telegram.me/share/url?$Adabiyot_va_ona_tili`

💎*Yaratuvchi:* [Telba_554](https://t.me/Telba_554)",
   ]);
 }


if (mb_stripos($text1,"/mark")!==false){
$mark= str_replace("/mark","",$text1);
bot('SendMessage', [
'chat_id'=>$chat_id,
'text'=> $mark,
'parse_mode'=>"markdown",
'reply_to_message_id'=> $mid,
]);
}

if (mb_stripos($text1,"/html")!==false){
$htm= str_replace("/html","",$text1);
bot('SendMessage', [
'chat_id'=>$chat_id,
'text'=> $htm,
'parse_mode'=>"html",
'reply_to_message_id'=> $mid,
]);
}

if (mb_stripos($text1,"/keep")!==false){
$ex = explode(" ", $text1);
$Adabiyot_va_ona_tili = $ex[1];
bot ('SendPhoto', [
'chat_id'=> $chat_id,
'photo'=>"http://www.keepcalmstudio.com/-/p.php?t=%EE%BB%AA%0D%0A$Adabiyot_va_ona_tili%0D%0A%0D%0A%EE%BB%AE%20%20And%20%20%EE%BB%AE%0D%0A%0D%0A%EE%BB%AAby: @Valijon_aka_robot&bc=000000&tc=FFFFFF&cc=FF0000&uc=true&ts=true&ff=PNG&w=500&ps=sq",
'caption'=>"💎*Yaratuvchi:* [Telba_554](https://t.me/Telba_554)",
'parse_mode'=>"markdown",
'reply_to_message_id'=> $mid,
]);
}

if (mb_stripos($text1,"/love")!==false){
$ex = explode(" ", $text1);
$Adabiyot_va_ona_tili = $ex[1];
bot ('SendPhoto', [
'chat_id'=> $chat_id,
'photo'=>"http://www.iloveheartstudio.com/-/p.php?t=%EE%BB%AE$Uz_Master1%EE%BB%AE%20%0A%0D%0A%0D%0A%EE%BB%AA%20%20Onam%20%20%EE%BB%AA&bc=000000&tc=ffffff&hc=FF0000&f=n&uc=true&ts=true&ff=PNG&w=500&ps=sq",
'caption'=>"*💎Yaratuvchi:* [Telba_554](https://t.me/Telba_554)",
'parse_mode'=>"markdown",
'reply_to_message_id'=> $mid,
]);
}

if (mb_stripos($text1,"/screen")!==false){
$ex = explode(" ", $text1);
$Adabiyot_va_ona_tili = $ex[1];
bot ('SendPhoto', [
'chat_id'=> $chat_id,
'photo'=>"http://api.s-shot.ru/?$Adabiyot_va_ona_tili",
'caption'=>"*💎Yaratuvchi:* [Telba_554](https://t.me/Telba_554)",
'parse_mode'=>"markdown",
'reply_to_message_id'=> $mid,
]);
}

$userID = $update->inline_query->from->id;
$cid = $update->inline_query->query;
$chat_id3 = $update->inline_query->id;

if(mb_stripos($cid,"@")!==false){
$user = bot("getchat",[
'chat_id'=>$cid,
]);
$type = $user->result->type;
$id = $user->result->id;
$description1 = $user->result->description;
$title1 = $user->result->title;
$us = bot('getChatMembersCount',[
'chat_id'=>$cid
]);
$count = $us->result;
if($type=="channel"){
bot('answerInlineQuery', [
'inline_query_id'=>$chat_id3,
'cache_time'=>1,
'results'=>json_encode([[
'type'=>'article',
'id'=>base64_encode(1),
'title'=>"💎$cid kanali haqida ma'lumot!",
'input_message_content'=>[
'disable_web_page_preview'=>true,
'parse_mode' => "markdown",
'message_text'=>"1⃣*Kanal nomi:* $title1
2⃣*Kanal useri:* [$cid]
3⃣*A'zolar soni:* `$count`
4⃣*Kanal ID:* `$id`
5⃣*Ma'lumot:* `$description1`",],
'reply_markup' =>[ 
'inline_keyboard'=>[
[['text'=>"🆔Aniqlash",'switch_inline_query'=>"@"],],
[['text'=>"💎Botga kirish",'url'=>"https://t.me/Valijon_aka_robot"],],
[['text'=>"👥Guruhga qo'shish",'url'=>"telegram.me/Valijon_aka_robot?startgroup=new"],],]],
]
])
]);
}

if ($type == "supergroup"){
bot('answerInlineQuery', [
'inline_query_id'=>$chat_id3,
'cache_time'=>1,
'results'=>json_encode([[
'type'=>'article',
'id'=>base64_encode(1),
'title'=>"💎$cid guruhi haqida ma'lumot!",
'input_message_content'=>[
'disable_web_page_preview'=>true,
'parse_mode' => "markdown",
'message_text'=>"1⃣*Guruh nomi:* $title1
2⃣*Guruh useri:* [$cid]
3⃣*A'zolar soni:* `$count`
4⃣*Guruh ID:* `$id`
5⃣*Ma'lumot:* `$description1`",],
'reply_markup' =>[ 
'inline_keyboard'=>[
[['text'=>"🆔Aniqlash",'switch_inline_query'=>"@"],],
[['text'=>"💎Botga kirish",'url'=>"https://t.me/Valijon_aka_robot"],],
[['text'=>"👥Guruhga qo'shish",'url'=>"telegram.me/Valijon_aka_robot?startgroup=new"],],]],
]
])
]);
}
}

if(mb_stripos($text1,"/ism") !== false){ 
$ex=explode(" ",$text1);
$ism = file_get_contents("https://ismlar.com/search/$ex[1]");
$exp = explode('<p class="text-size-5">',$ism);
$expl = explode('<div class="col-12 col-md-4 text-md-right">',$exp[1]);
$im = str_replace($expl[1],' ',$exp[1]);
$ims = str_replace('</p>',' ',$im);
$isms = str_replace('</div>',' ',$ims);
$ismn = str_replace('<div class="col-12 col-md-4 text-md-right">',' ',$isms);
$ismk = str_replace('&#039;','`',$ismn);
$ismm = trim("$ismk");
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text' => "📚*Ismlar ma'nosi📚

🔖 $ex[1]

📑Manosi: $ismm*",
'reply_to_message_id'=>$mid,
     'parse_mode' => 'markdown'
    ]);
   }

if($data == "stat1"){
$gr = substr_count($guruhlar,"\n"); 
$us = substr_count($userlar,"\n"); 
$obsh = $gr + $us;
   bot('editmessagetext',[
   'chat_id'=>$chat_id2,
    'message_id'=>$message_id2,
       'text'=> "ℹFoydalanuvchilar:
🌏Umumiy: *$obsh*
👤Userlar: *$us*
👥Guruhlar: *$gr*
💪 [Telba_554](https://t.me/Telba_554)

$bugun $soat",
'parse_mode' => 'markdown',
'disable_web_page_preview'=>true,
  'reply_markup'=>json_encode([   
   'inline_keyboard'=>[   
[['text'=>"♻Yangilash",'callback_data'=>"stat1"]],
]
]),
]);
}

if ($text1 == "/stat"){
$gr = substr_count($guruhlar,"\n"); 
$us = substr_count($userlar,"\n"); 
$obsh = $gr + $us;
bot ('sendmessage', [
'chat_id'=>$chat_id,
   'text'=> "ℹFoydalanuvchilar:
🌏Umumiy: *$obsh*
👤Userlar: *$us*
👥Guruhlar: *$gr*
💪 [Telba_554](https://t.me/Telba_554)

$bugun $soat",
'parse_mode' => 'markdown',
'disable_web_page_preview'=>true,
  'reply_markup'=>json_encode([   
   'inline_keyboard'=>[   
[['text'=>"♻Yangilash",'callback_data'=>"stat1"]],
]
]),
]);
}

if($text1 == "/setphoto" or $text1 == "/setphoto@Valijon_aka_robot"){
$gett = bot('getChatMember', [
'chat_id'=>$chat_id,
'user_id'=>$fadmin,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
$photo = $update->message->reply_to_message->photo;
$file = $photo[count($photo)-1]->file_id;
$get = bot('getfile',[
'file_id'=>$file,
]);
$getchat = json_decode($get, true);
$patch = $getchat["result"]["file_path"];
file_put_contents("viki/photogp.png",file_get_contents("https://api.telegram.org/file/bot$token/$patch"));
bot('setChatPhoto',[
'chat_id'=>$chat_id,
'photo'=>new CURLFile("viki/photogp.png")
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"html",
 'text'=>"✅<code>$title</code> <b>guruhidagi rasm o'zgartirildi. Rasmni olib tashlash uchun<b> <code>/delphoto</code> <b>buyrug'idan foydalaning.</b>",
'reply_to_message_id'=>$mid,
]);
unlink("viki/photogp.png");
}
}

if($text1 == "/delphoto" or $text1 == "/delphoto@Valijon_aka_robot"){
$gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
bot('deleteChatPhoto',[
'chat_id'=>$chat_id,
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"html",
'text'=>"✅<code>$title</code> <b>guruhidagi rasm olib tashlandi. Yangi rasmni o'rnatish uchun</b> <code>/setphoto</code> <b>buyrug'idan foydalaning</b>",
'reply_to_message_id'=>$mid,
]);
}
}

if($text1 == "/leave"  or $text1 == "/leave@Valijon_aka_robot"){
$gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"html",
'text'=>"📛@Valijon_aka_robot'<b>ning guruhdagi faoliyati to'xtatildi:</b>

🔹<b>Guruh ID:</b> $chat_id
🔸<b>Guruh nomi:</b> $title
🔵 <b>Guruh admini:</b> <a href='tg://user?id=$fadmin'>$name</a>",
'reply_to_message_id'=>$mid,
]);
bot('LeaveChat',[
'chat_id'=>$chat_id,
]);
}
}

if ($text1 == "/admins" or $text1 == "/admins@Valijon_aka_robot"){
$gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
bot ('SendMessage', [
'chat_id'=> $chat_id,
'text'=>"👨‍💻*Foydalanuvchini admin qilmoqchimisiz yoki adminlikdan olmoqchimisiz:*",
    'parse_mode' => 'markdown',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard' => [
[['text'=>"☑️Admin qilish",'callback_data'=>"addadmin_$id1"]],
[['text'=>"🗑Adminlikdan olish",'callback_data'=>"deladmin_$id1"]]
]
]),
]);
}
}

if (mb_stripos($data,"addadmin")!==false){
$ex = explode("_",$data);
$gett2 = bot('getChatMember', [
'chat_id' => $chat_id2,
'user_id' => $fadmin2,
]);
$get2 = $gett2->result->status;
if($get2 =="administrator" or $get2 == "creator"){
      bot('promoteChatmember',[
      'chat_id'=>$chat_id2,
      'user_id'=>$ex[1],
      'can_change_info'=>true,
      'can_post_messages'=>false,
      'can_edit_messages'=>false,
      'can_delete_messages'=>true,
      'can_invite_users'=>true,
      'can_restrict_members'=>true,
      'can_pin_messages'=>true,
      'can_promote_members'=>false
      ]);
bot ('EditMessageText', [
'chat_id'=> $chat_id2,
'message_id'=>$message_id2,
'parse_mode'=>"markdown",
'text'=>"☑️*Yaxshi endi u bu guruh admini*",
]);
}
}

if (mb_stripos($data,"deladmin")!==false){
$ex = explode("_",$data);
$gett2 = bot('getChatMember', [
'chat_id' => $chat_id2,
'user_id' => $fadmin2,
]);
$get2 = $gett2->result->status;
if($get2 =="administrator" or $get2 == "creator"){
      bot('promoteChatmember',[
      'chat_id'=>$chat_id2,
      'user_id'=>$ex[1],
      'can_change_info'=>false,
      'can_post_messages'=>false,
      'can_edit_messages'=>false,
      'can_delete_messages'=>false,
      'can_invite_users'=>false,
      'can_restrict_members'=>false,
      'can_pin_messages'=>false,
      'can_promote_members'=>false
   ]);
    bot('EditMessageText',[
        'chat_id'=>$chat_id2,
     'message_id'=> $message_id2,
        'text'=>"☑*Yaxshi u guruhda adminlar qatoridan olindi*",
        'parse_mode'=>'markdown',
      ]);
}
}

if($text1 =="/text@Valijon_aka_robot" or $text1 =="/text") {
$gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if ($get =="administrator" or $get == "creator"){
bot ('SendMessage',[
'chat_id'=> $chat_id,
'message_id'=> $mid,
'text'=>"📑*Xabarni nima qilmoqchisiz:*",
      'parse_mode'=>'markdown',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(
['inline_keyboard' => [
  [['text'=>"📦Pin",'callback_data'=>"pin_$repmid"],['text'=>"📮Unpin",'callback_data'=>"unpin_$repmid"]],
  [['text'=>"🗑O'chirish",'callback_data'=>"del_$repmid"]]
 ]
 ]),
    ]);
  }
}

if (mb_stripos($data,"pin") !== false){
$ex = explode("_",$data);
$gett2 = bot('getChatMember', [
'chat_id' => $chat_id2,
'user_id' => $fadmin2,
]);
$get2 = $gett2->result->status;
if($get2 =="administrator" or $get2 == "creator"){
     bot('EditMessageText',[
        'chat_id'=>$chat_id2,
'message_id'=> $message_id2,
        'text'=>"✅*Qistirildi*",
        'parse_mode'=>'markdown',
]);
 bot('PinchatMessage',[
    'chat_id'=> $chat_id2,
    'message_id'=> $ex[1],
  ]);
  }
}

if (mb_stripos($data,"unpin") !== false){
$ex = explode("_",$data);
$gett2 = bot('getChatMember', [
'chat_id' => $chat_id2,
'user_id' => $fadmin2,
]);
$get2 = $gett2->result->status;
if($get2 =="administrator" or $get2 == "creator"){
     bot('EditMessageText',[
        'chat_id'=>$chat_id2,
'message_id'=> $message_id2,
'parse_mode'=>"markdown",
 'text'=>"🗑*Qistirilgan xabar olib tashlandi*",
 ]);
   bot('unpinchatMessage',[
'chat_id'=> $chat_id2,
'message_id'=> $ex[1],
 ]);
 }
 }
 
if (mb_stripos($data,"del") !== false){
$ex = explode("_",$data);
$gett2 = bot('getChatMember', [
'chat_id' => $chat_id2,
'user_id' => $fadmin2,
]);
$get2 = $gett2->result->status;
if($get2 =="administrator" or $get2 == "creator"){
     bot('EditMessageText',[
        'chat_id'=>$chat_id2,
'message_id'=> $message_id2,
'parse_mode'=>"markdown",
 'text'=>"🗑*Xabar o'chirildi*",
 ]);
     bot('deletemessage',[
        'chat_id'=>$chat_id2,
        'message_id'=>$ex[1],
    ]);
   }
}

if($text1=="/ban" or $text1=="/Ban" or $text1=="/ban@Valijon_aka_robot"){
  $gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){ 
  bot('kickChatMember',[    
    'chat_id'=>$chat_id,    
    'user_id'=>$id1, 
    'can_send_messages'=>false,    
    'can_send_media_messages'=>false,    
    'can_send_other_messages'=>false,    
    'can_add_web_page_previews'=>false    
  ]);    
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"<a href='tg://user?id=$id1'>$repname</a> banlandi",
        'parse_mode'=>'html',
   ]);
  }
}

if($text1 =="/ro" or $text1 =="/ro@Valijon_aka_robot"){
  $gett=bot('getchatmember',[
'chat_id'=>$chat_id,
'user_id'=>$fadmin,
]);
$get=$gett->result->status;
if ($get =="administrator" or $get == "creator"){
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"<a href='tg://user?id=$id1'>$repname</a> 30 daqiqaga ro rejimga tushurildi",
        'parse_mode'=>'html',
    ]);
  bot('restrictChatMember',[
    'chat_id'=>$chat_id,
    'user_id'=>$id1,
    'until_date'=>strtotime("+ 30 minutes "),
  ]);
}
}

if($text1=="/unro" or $text1 =="/unro@Valijon_aka_robot"){
$gett=bot("getchatmember",[
'chat_id'=>$chat_id,
'user_id'=>$fadmin,
]);
$get=$gett->result->status;
if($get =="administrator" or $get == "creator"){
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"<a href='tg://user?id=$id1'>$repname</a> ro rejimidan olindi",
        'parse_mode'=>'html',
    ]);
  bot('restrictChatMember',[    
    'chat_id'=>$chat_id,    
    'user_id'=>$id1, 
    'can_send_messages'=>true,    
    'can_send_media_messages'=>true,    
    'can_send_other_messages'=>true,    
    'can_add_web_page_previews'=>true    
  ]);    
}
}

if($text1 =="/kick" or $text1 =="/kick@Valijon_aka_robot"){
$gett=bot("getchatmember",[
'chat_id'=>$chat_id,
'user_id'=>$fadmin,
]);
$get=$gett->result->status;
if($get =="administrator" or $get == "creator"){ 
  bot('kickChatMember',[    
    'chat_id'=>$chat_id,    
    'user_id'=>$id1,     
    'can_send_messages'=>true,    
    'can_send_media_messages'=>true,    
    'can_send_other_messages'=>true,    
    'can_add_web_page_previews'=>true 
  ]);    
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"<a href='tg://user?id=$id1'>$repname</a> guruhdan chiqarib yuborildi",
        'parse_mode'=>'html',
    ]);
  }
}

if($text1 =="/warn" or $text1 =="/warn@Valijon_aka_robot"){
$gett=bot("getchatmember",[
'chat_id'=>$chat_id,
'user_id'=>$fadmin,
]);
$get=$gett->result->status;
if($get =="administrator" or $get == "creator"){ 
$war=file_get_contents("warn1.dat");
$jazo="$war\n$chat_id=$id1";
file_put_contents("warn1.dat",$jazo);
$war=file_get_contents("warn1.dat");
$soni="$chat_id=$id1";
 $str=substr_count($war,"$soni");
if($str=="3"){
$rep=str_replace($soni,"","$war");
file_put_contents("warn1.dat",$rep);
  bot('kickChatMember',[    
    'chat_id'=>$chat_id,    
    'user_id'=>$id1, 
    'can_send_messages'=>false,    
    'can_send_media_messages'=>false,    
    'can_send_other_messages'=>false,    
    'can_add_web_page_previews'=>false    
  ]);    
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"<a href='tg://user?id=$id1'>$repname</a> ogohlantirishga etibor bermaganligi sababli guruhdan chiqarib yuborildi",
        'parse_mode'=>'html',
    ]);
}elseif($str<"3"){
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"<a href='tg://user?id=$id1'>$repname</a> ogohlantirish berildi\nOgohlantrishlar soni: $str/3",
        'parse_mode'=>'html',
    ]);
}
}
}

if($text1 =="/nowarn" or $text1 =="/nowarn@Valijon_aka_robot"){
$gett=bot("getchatmember",[
'chat_id'=>$chat_id,
'user_id'=>$fadmin,
]);
$get=$gett->result->status;
if($get =="administrator" or $get == "creator"){ 
$war=file_get_contents("warn1.dat");
$soni="$chat_id=$id1";
$rep=str_replace($soni,"","$war");
file_put_contents("warn1.dat",$rep);
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"<a href='tg://user?id=$id1'>$repname</a> barcha ogohlantirishlar olib tashlandi",
        'parse_mode'=>'html',
    ]);
  }
}

if($text1 =="/mywarn" or $text1 =="/mywarn@Valijon_aka_robot"){
$war=file_get_contents("warn1.dat");
$soni="$chat_id=$fadmin";
$str=substr_count($war,"$soni");
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"<a href='tg://user?id=$fadmin'>$name</a> ogohlantirishlar soni: $str/3",
        'parse_mode'=>'html',
    ]);
}

if($text1 =="/unban" or $text1 =="/unban@Valijon_aka_robot"){
$gett=bot("getchatmember",[
'chat_id'=>$chat_id,
'user_id'=>$fadmin,
]);
$get=$gett->result->status;
if($get =="administrator" or $get == "creator"){ 
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"<a href='tg://user?id=$id1'>$repname</a> bandan olindi",
        'parse_mode'=>'html',
    ]);
  bot('unbanChatMember',[    
    'chat_id'=>$chat_id,    
    'user_id'=>$id1,    
  ]);    
}
}

if(isset($update) and $Schats == "true"){
  if((stripos($text1,"Salom") !== false) or (stripos($text1,"салом")!==false)){
 if($fadmin==$admin){
    bot('sendmessage',[
      'chat_id'=>$chat_id,
      'text'=>"`@Telba_554` xo'jayin keldi!",
'reply_to_message_id'=> $mid,
      ]);
  }else{
  $name = $message->from->first_name;
  $input = array("✌️'Guten tak', Nima gap so'tak😂
Nemischa salom, o'rgangin bolam","👋Aley, ishla qaley","Voalaykum salom bo'tam","💁‍♂️ Salom so'zini 2 ga bo'lib o'qisak: 'Sal' 'om' ya'ni Salom bervotgan odam sal omiroq degani🤣😆","Tursunali nima gaap!😂😆","👋Salom ey ukam, bo'lib qolmagin Spam
Spam bu yomon, joning bo'lsin omon😉","Nima gap✌️","Salom😃", "Aa Chigirtka nma gap😆","😃 Salom, ishla qale $name","Qalesan bolam, yuriptilami Xolam😉", "Nima gap tinchmi bolam, naqadar go'zaldur bu olam🌸", "Jonga teydi Salom bervurishing, boshqa qiladigan yo'mi ishing😂", "Messikalla qalesan😂😂😆");
  $rand=rand(0,15);
  $soz="$input[$rand]"; $a=json_encode(bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>$soz,
'reply_to_message_id'=> $mid,
   'parse_mode'=> 'markdown'
  ]));
}
  }

if((stripos($text1,"Viki") !== false) or (stripos($text1,"Valijon")!==false)  or (stripos($text1,"Vali")!==false) or (stripos($text1,"Bot")!==false)  or  (stripos($text1,"vali")!==false) or (stripos($text1,"viki")!==false) or (stripos($text1,"valijon")!==false) or (stripos($text1,"bot")!==false)){
  $input = array("Hm bolam nima disan😂","Bor chetroda o'ynagine😂", "😉 Viki xizmatizga shay, nima gap o'zi ishlariz qalay","Ho'sh indan keyinchi.. qani bo'l tez gapirchi","Eee o'siro qong'iz, nima gap😂😂😆", "Jo'raqul nima disan😆", "Norm👍", "Ho'sh...","Hov");
  $rand=rand(0,11);
  $soz="$input[$rand]"; $a=json_encode(bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>$soz,
'reply_to_message_id'=> $mid,
   'parse_mode'=> 'markdown'
  ]));
}
if((stripos($text1,"Qalesz") !== false) or (stripos($text1,"Qale")!==false)  or (stripos($text1,"Qalesiz")!==false) or (stripos($text1,"Qalesan")!==false)  or  (stripos($text1,"Ishla qale")!==false) or (stripos($text1,"qale")!==false) or (stripos($text1,"qalesan")!==false) or (stripos($text1,"qalesiz")!==false) or (stripos($text1,"qaleysiz")!==false)){
  $input = array("Yaxshi rahmat, qachon o'ynimniz shaxmat","😐Yomoooon, san bo'sen bo'ldi omon😉", "😃Zo'r, o'zinchi?","Kayfiyatla a'lo🤘","Yaxshi😁", "Clash o'ynab yuribman, bir-bir farm qilib turimman…
Clash o'ynasen chunasan, o'ynamasen yaxshi qilasan", "Norm👍", "O'zinda nima gap, yuribsanmi dumalab😂
Telegramda o'tirma ko'p, undan ko'ra ko'chada o'yna cho'p😆","😒 Xol-ahvol so'ravurarkande endi, $name","Manda hammasi yaxshi, lekin Ota-onam uylanishimga qarshi
Kinolada bo'ladi shunaqa, o'zin tuzumisan ishlarin qanaqa","✌️Nima gap tuzmisan bola, ichib yurbsanmi Cola
Manda atak kayfiyat zo'ra, ishonmasen profilimni rasmiga qarab ko'ra😂","Manku yaxshi, o'zinchi $name, qalesan😃","Kayfiyatlarim hozir a'lo, nima ishing bor sani baqalo😆");
  $rand=rand(0,11);
  $soz="$input[$rand]"; $a=json_encode(bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>$soz,
'reply_to_message_id'=> $mid,
   'parse_mode'=> 'markdown'
  ]));
}
}

$key = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"👤Userlarga xabar yuborish"],],
[['text'=>"👥Guruhlarga xabar yuborish"],],
[['text'=>"👤Userlar"],['text'=>"👥Guruhlar"],],
]
]);

if($text1 == "/xabar"&&$fadmin==$admin){
ty($chat_id); 
 bot('SendMessage',[ 
'chat_id'=>$admin,
'message_id'=>$mid,
'parse_mode'=>'markdown',
'text'=>"🔹*Siz adminsiz kerakli bo'limni tanlang:*",
'reply_markup'=>$key,
]);
}

if($text1 == "👥Guruhlar"&&$fadmin==$admin){
  bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>$guruhlar,
    ]);
}

if($text1 == "👤Userlar"&&$fadmin==$admin){
  bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>$userlar,
    ]);
}

$yubbi = "📨Yuboriladigan xabar matnini kiriting. Xabar turi markdown";
 if($text1 == "👤Userlarga xabar yuborish" and $chat_id == $admin){
      ty($chat_id);
      bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>$yubbi,
      ]);
      file_put_contents("stat/$chat_id.step","user");
    }

    if($step == "user" and $chat_id == $admin){
  file_put_contents("stat/$chat_id.step","link");
file_put_contents("stat/$chat_id.matn",$text1);
 bot('sendmessage',[
          'chat_id'=>$admin,
          'parse_mode'=>"markdown",
          'text'=>"✅*Matn qabul qilindi endi namuna bo'yicha knopkani yuboring!
Namuna:*
`Telba_554 + https://t.me/Telba_554`",
          ]);      
}
    
if($step == "link"){
      if($text1 == "/otmen"){
      file_put_contents("stat/$chat_id.step","");
      }else{ 
$in=file_get_contents("stat/$chat_id.in");
$matn=file_get_contents("stat/$chat_id.matn");
   $i=0;
$keyboard = [];
$keyboard["inline_keyboard"] = [];
$rows = explode("\n",$text1);
foreach($rows as $row){
$j=0;
$keyboard["inline_keyboard"][$i]=[];
$bottons = explode(",",$row);
foreach($bottons as $botton){
$data = explode("+",$botton."+");
$Ibotton = ["text" => trim($data[0]), "url" => trim($data[1])];
$keyboard["inline_keyboard"][$i][$j] = $Ibotton;
$j++;
}
$i++;
}
$reply_markup=json_encode($keyboard);
$soni=substr_count($userlar,"\n")-1;
      $idszs=explode("\n",$userlar);
      foreach($idszs as $idlat){
     $userr = bot('sendMessage',[
      'chat_id'=>$idlat,
      'text'=>$matn,
      'parse_mode'=>'markdown',
      'disable_web_page_preview' => true,
      'reply_markup'=>($reply_markup)
      ]);
 $sended=$userr->ok;
if($sended){
$true=file_get_contents("viki/send.ok");
file_put_contents("viki/send.ok","$true\n$idlat");
}else{
$false=file_get_contents("viki/send.no");
file_put_contents("viki/send.no","$false\n$idlat");
}
}
$true=file_get_contents("viki/send.ok");
$false=file_get_contents("viki/send.no");
$truecount=substr_count($true,"\n");
$falsecount=substr_count($false,"\n");
bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>"Userlarga yuborildi\nYubordim: $truecount/$soni\nYuborolmadim: $falsecount/$soni",
    'parse_mode'=>"markdown",
    ]);
file_put_contents("viki/send.ok","");
file_put_contents("viki/send.no","");
  file_put_contents("stat/$chat_id.step","");
}
}
   
       if($text1 == "👥Guruhlarga xabar yuborish" and $chat_id == $admin){
      ty($chat_id);
      bot('sendmessage',[
      'chat_id'=>$chat_id,
      'text'=>$yubbi,
      ]);
      file_put_contents("stat/$chat_id.step","guruh");
    }

       if($text1 == "👥Guruhlarga xabar yuborish" and $chat_id == $admin){
      ty($chat_id);
      bot('sendmessage',[
      'chat_id'=>$chat_id,
      'text'=>$yubbi,
      ]);
      file_put_contents("stat/$chat_id.step","guruh");
    }

    if($step == "guruh" and $chat_id == $admin){
    	         file_put_contents("stat/$chat_id.step","link1");
          file_put_contents("stat/$chat_id.matn1",$text1);
 bot('sendmessage',[
          'chat_id'=>$admin,
              'parse_mode'=>"markdown",
          'text'=>"✅*Matn qabul qilindi endi namuna bo'yicha knopkani yuboring!
Namuna:*
`Telba_554 + https://t.me/Telba_554`",
          ]);      
}

if($step == "link1"){
      if($text1 == "/otmen"){
      file_put_contents("stat/$chat_id.step","");
      }else{ 
      	      $matn1=file_get_contents("stat/$chat_id.matn1");
     
   $i=0;
$keyboard = [];
$keyboard["inline_keyboard"] = [];
$rows = explode("\n",$text1);
foreach($rows as $row){
$j=0;
$keyboard["inline_keyboard"][$i]=[];
$bottons = explode(",",$row);
foreach($bottons as $botton){
$data = explode("+",$botton."+");
$Ibotton = ["text" => trim($data[0]), "url" => trim($data[1])];
$keyboard["inline_keyboard"][$i][$j] = $Ibotton;
$j++;
}
$i++;
}
$reply_markup=json_encode($keyboard);
     $soni=substr_count($guruhlar,"\n")-1;
    $idszs=explode("\n",$guruhlar);
      foreach($idszs as $idlat){
    $guruu =  bot('sendMessage',[
      'chat_id'=>$idlat,
         'text'=>$matn1,
      'parse_mode'=>'markdown',
      'disable_web_page_preview' => true,
    'reply_markup'=>($reply_markup)
      ]);
  $sended=$guruu->ok;
if($sended){
$true=file_get_contents("viki/send.ok");
file_put_contents("viki/send.ok","$true\n$idlat");
}else{
$false=file_get_contents("viki/send.no");
file_put_contents("viki/send.no","$false\n$idlat");
}
}
$true=file_get_contents("viki/send.ok");
$false=file_get_contents("viki/send.no");
$truecount=substr_count($true,"\n");
$falsecount=substr_count($false,"\n");   
          bot('sendmessage',[
          'chat_id'=>$admin,
          'text'=>"Guruhlarga yuborildi\nYubordim: $truecount/$soni\nYuborolmadim: $falsecount/$soni",
          ]);      
      file_put_contents("stat/$chat_id.step","");
        }
      }
      
?>