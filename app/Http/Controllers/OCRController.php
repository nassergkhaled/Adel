<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OCRController extends Controller
{
    public function parseImage(Request $request)
    {
        // Validate the incoming request to ensure a file is uploaded
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,tiff,bmp,pdf|max:10240', // max 10MB
        ]);

        $client = new Client();

        // Get the uploaded file
        $file = $request->file('image');

        // Prepare the multipart form data
        $multipart = [
            [
                'name'     => 'file',
                'contents' => fopen($file->getPathname(), 'r'),
                'filename' => $file->getClientOriginalName(),
            ],
            [
                'name'     => 'language',
                'contents' => $request->input("language"),
            ],
            [
                'name'     => 'isOverlayRequired',
                'contents' => 'false',
            ],
        ];

        // Make the POST request to the OCR API
        $response = $client->post('https://api.ocr.space/parse/image', [
            'headers' => [
                'Accept' => 'application/json',
                'apikey' => env('SPACE_OCR_API_KEY'),
            ],
            'multipart' => $multipart,
        ]);

        // Get the response body
        $responseBody = json_decode($response->getBody(), true);

        $parsedText = $responseBody['ParsedResults'][0]['ParsedText'] ?? '';
        $cleanedText = str_replace(["\r\n","\r", "\n"], '', $parsedText);


        // Handle the response as needed
        return response()->json($cleanedText);
    }

    public function wireParseImage($data)
    {
        $client = new Client();

        // Prepare the multipart form data
        $multipart = [
            [
                'name'     => 'file',
                'contents' => fopen($data['image'], 'r'),
                'filename' => $data['filename'],
            ],
            [
                'name'     => 'language',
                'contents' => $data['language'],
            ],
            [
                'name'     => 'isOverlayRequired',
                'contents' => 'false',
            ],
        ];

        // Make the POST request to the OCR API
        $response = $client->post('https://api.ocr.space/parse/image', [
            'headers' => [
                'Accept' => 'application/json',
                'apikey' => env('SPACE_OCR_API_KEY'),
            ],
            'multipart' => $multipart,
        ]);

        // Get the response body
        $responseBody = json_decode($response->getBody(), true);

        $parsedText = $responseBody['ParsedResults'][0]['ParsedText'] ?? '';
        $cleanedText = str_replace(["\r\n"], ' ', $parsedText);


        return $cleanedText;
    }
}
