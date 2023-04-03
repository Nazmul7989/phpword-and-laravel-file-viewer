<?php

namespace App\Http\Controllers;


use Dompdf\Dompdf;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Shared\Html;
use PhpOffice\PhpWord\TemplateProcessor;
use Vish4395\LaravelFileViewer\LaravelFileViewer;


class DocumentController extends Controller
{
    public function index()
    {
        //get variables from docx file
        $filepath = storage_path('app/public/documents/test.docx');
//        $templateProcessor = new TemplateProcessor($filepath);
//        $variables = $templateProcessor->getVariables();
//        foreach ($variables as $variable){
//            dd($variable);
//        }

        //set value to variable
//        $templateProcessor->setValues(array('name' => 'John Doe', 'email' => 'John@gmail.com','phone' => '01928472474'));

        //save the updated file
//        $updatepath = storage_path('app/public/documents/testUpdate.docx');
//        $templateProcessor->saveAs($updatepath);

        //convert docx to pdf without original style
        $pdfpath = storage_path('app/public/documents/test.pdf');

        $domPdfPath = base_path('vendor/dompdf/dompdf');
        Settings::setPdfRendererPath($domPdfPath);
        Settings::setPdfRendererName('DomPDF');
        $Content = IOFactory::load($filepath);
        $PDFWriter = IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save($pdfpath);



        // Save the document as HTML
//        $filepath = storage_path('app/public/documents/test.docx');
//        Settings::setOutputEscapingEnabled(true);
//        $phpWord = IOFactory::load($filepath);
//        $xmlWriter = IOFactory::createWriter($phpWord, 'HTML');
//        $htmlFilePath = storage_path('app/public/documents/' . 'test' . '.html');
//        $xmlWriter->save($htmlFilePath);

        // Convert the HTML to PDF using DOMPDF
//        $dompdf = new Dompdf();
//        $html = file_get_contents($htmlFilePath);
//        $dompdf->loadHtml($html);
//        $dompdf->setPaper('A4', 'portrait');
//        $dompdf->render();
//
//        $pdfpath = storage_path('app/public/documents/test.pdf');
//        $pdf_output = $dompdf->output();
//        file_put_contents($pdfpath, $pdf_output);

        // Delete the temporary files
//        unlink($htmlFilePath);



        return redirect('/');
    }

    public function create()
    {
        return view('documents.create');
    }


    public function file_preview($filename){
        $filepath = 'public/documents/'.$filename;
        $file_url = asset('storage/documents/'.$filename);

        $file_data=[
            [
                'label' => __('Label'),
                'value' => "Value"
            ]
        ];

        $fileViewer = new LaravelFileViewer();

        return  $fileViewer->show($filename,$filepath,$file_url,$file_data);

    }


}
