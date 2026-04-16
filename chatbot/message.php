<?php
require 'ChatGPTClass.php';
@include 'config.php';

// Check if constant is defined, fallback to sample text or empty string
$apiKey = defined('OPENAI_API_KEY') ? OPENAI_API_KEY : 'YOUR_API_KEY_HERE';
$model  = defined('OPENAI_MODEL') ? OPENAI_MODEL : 'gpt-3.5-turbo';
$sysMsg = defined('CHATBOT_SYSTEM_MSG') ? CHATBOT_SYSTEM_MSG : 'You are a helpful assistance bot.';

$cumle     = $_POST['soru'];
$chatGPT = new ChatGPT($apiKey, $model, $sysMsg);
$response = $chatGPT->sendMessage($cumle);

//Print the json content
$content = json_decode($response, true)['choices'][0]['message']['content'];
echo $content;

?>