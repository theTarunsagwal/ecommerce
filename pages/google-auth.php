<?php
session_start();
// 939264482794-4rqu9il5k9qg701odem13knqnr735dhr.apps.googleusercontent.com
$google_oauth_client_id = 'id';  
// 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
$google_oauth_client_secret = 'secret';
$google_oauth_redirect_uri = 'http://localhost/ecommerce/pages/google-auth.php';
$google_oauth_version = 'v3';

if (isset($_GET['code']) && !empty($_GET['code'])) {
    $params = [
        'code' => $_GET['code'],
        'client_id' => $google_oauth_client_id,
        'client_secret' => $google_oauth_client_secret,
        'redirect_uri' => $google_oauth_redirect_uri,
        'grant_type' => 'authorization_code'
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://oauth2.googleapis.com/token');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    
    if (curl_errno($ch)) {
        exit('cURL error: ' . curl_error($ch));
    }

    curl_close($ch);
    $response = json_decode($response, true);

    if (isset($response['access_token']) && !empty($response['access_token'])) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/oauth2/' . $google_oauth_version . '/userinfo');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $response['access_token']]);
        
        $user_info_response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            exit('cURL error: ' . curl_error($ch));
        }

        curl_close($ch);
        $profile = json_decode($user_info_response, true);
        
        if (isset($profile['email'])) {
            session_regenerate_id();
            $_SESSION['full_details'] = $profile;
            $_SESSION['google_loggedin'] = TRUE;
            $_SESSION['google_email'] = $profile['email'];
            $_SESSION['google_name'] = $profile['name'] ?? '';
            $_SESSION['google_picture'] = $profile['picture'] ?? '';
            
            header('Location: success_page.php');
            exit;
        } else {
            exit('Could not retrieve profile information! Please try again later!');
        }
    } else {
        exit('Invalid access token! Please try again later!');
    }
} else {
    $params = [
        'response_type' => 'code',
        'client_id' => $google_oauth_client_id,
        'redirect_uri' => $google_oauth_redirect_uri,
        'scope' => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
        'access_type' => 'offline',
        'prompt' => 'consent'
    ];
    header('Location: https://accounts.google.com/o/oauth2/auth?' . http_build_query($params));
    exit;
}
?>