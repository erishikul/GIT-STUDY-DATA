<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Google_Client;
use Google_Service_Indexing;

class GoogleIndexingController extends Controller
{
    public function postArticle(Request $request){
        
        return "test";
         // Load credentials from the JSON file
         $client = new Google_Client();
         $client->setAuthConfig(config_path('google-indexing-api.json'));
         $client->setScopes([Google_Service_Indexing::INDEXING]);   
         $client->setAccessType('offline');
 
         // Get a Google_Service_Indexing instance
         $service = new Google_Service_Indexing($client);
 
         // Replace "https://example.com/" with your website URL and "article-url" with the URL of the newly posted article
         $articleUrl = "https://example.com/article-url";
 
         // Request indexing for the article URL
         try {
             $service->urlNotifications->publish([
                 'url' => $articleUrl,
                 'type' => 'URL_UPDATED'
             ]);
             return response()->json(['message' => 'Article URL submitted for indexing successfully']);
         } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()], 500);
         }


    }
}



// Your article creation logic goes here...

// Notify Google about the newly created article
//$response = Http::post(route('post-article'));
// Handle the response as needed