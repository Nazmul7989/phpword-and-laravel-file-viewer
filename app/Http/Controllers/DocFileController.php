<?php

namespace App\Http\Controllers;

use App\Models\DocFile;
use Google_Service_Drive_DriveFile;
use Illuminate\Http\Request;
use Google\Client as GoogleClient;
use Google\Service\Drive;

class DocFileController extends Controller
{
    public function index()
    {
        return view('file');
    }

    public function store(Request $request)
    {
        // Instantiate a new Google client object
        $client = new GoogleClient();

        // Set up the credentials using the service account key
        $client_secret_path = storage_path('app/public/documents/client_secret.json');
//        $client_secret_path = asset('storage/documents/client_secret.json');

        $client->setAuthConfig($client_secret_path);


        // Create a new Drive API instance with the authenticated client
        $drive = new Drive($client);


        $fileMetadata = new Google_Service_Drive_DriveFile(array(
            'name' => 'My Document',
            'parents' => array('1z0HkRPnTckF9LsGc-tMEZJzcSInwVQdq'),
            'mimeType' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ));


        $filepath = storage_path('app/public/documents/test.docx');
        $content = file_get_contents($filepath);
        print_r($fileMetadata) ;
        $file = $drive->files->create($fileMetadata, array(
            'data' => $content,
            'mimeType' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'uploadType' => 'multipart'
        ));

        // Save $embedLink in your database
        $embedLink = $file->getWebContentLink();

        $doc = new DocFile();
        $doc->link = $embedLink;
        $doc->save();

        return redirect('/');

    }
}
