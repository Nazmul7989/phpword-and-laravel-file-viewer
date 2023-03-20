<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="{{ route('index') }}" style="border: 1px solid red;padding: 10px;">Back</a>

<h3>Document List</h3>
<a href="{{ route('document.file_preview',['filename' => 'test.docx']) }}" style="border: 1px solid red;padding: 10px;">Doc View</a>
<a href="{{ route('document.file_preview',['filename' => 'pdf.pdf']) }}" style="border: 1px solid red;padding: 10px;">Pdf View</a>
<a href="{{ route('document.file_preview',['filename' => 'powerpoint.pptx']) }}" style="border: 1px solid red;padding: 10px;">Power Point View</a>
</body>
</html>
