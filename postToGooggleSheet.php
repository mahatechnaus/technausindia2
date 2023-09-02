<?php
require_once('./vendor/autoload.php');
define('SHREAD_SHEET_ID', '1_0AN9THJfYQlyrspUvdjIt-g4AgTMEzf1HLeTN4-Zmw'); // Google Sheet Id
define('SPREAD_SHEET_CREDENTIALS_FILE', 'technausgetquote-f2336fffe063.json');   //PATH TO JSON FILE DOWNLOADED FROM GOOGLE CONSOLE

function getClient()
{
  $client = new Google_Client();
  $client->setApplicationName('Project');
  $client->setScopes(Google_Service_Sheets::SPREADSHEETS);
  $client->setAuthConfig(SPREAD_SHEET_CREDENTIALS_FILE);
  $client->setAccessType('offline');
  return $client;
}

function insertIntoSheets($range = 'Sheet1', array $data = [])
{
    
 
  // Get the API client and construct the service object.
  $data['createdon'] =  date("F j, Y, g:i a", time());
                
    
                $dataArray = array_values(  $data);
  $client = getClient();
  $service = new Google_Service_Sheets($client);
  $valueRange = new Google_Service_Sheets_ValueRange();
  $valueRange->setValues(
    [
      'values' => $dataArray
    ]
  );
  $conf = ["valueInputOption" => "RAW"];

  $spreadsheetId = SHREAD_SHEET_ID;
  $response = $service->spreadsheets_values->append($spreadsheetId, $range, $valueRange, $conf);

  return $response;
}

              
                

