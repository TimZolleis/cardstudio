<!doctype html>
<html lang="<?= service('request')->getLocale(); ?>">
<head>
    <title><?= lang('app.name') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?=base_url()?>/icon.png" type="image/png">
    <script type="text/javascript" src="<?=base_url()?>/JS/Form/ValidateForm.js" defer></script>
    <script type="text/javascript" src="<?=base_url()?>/JS/pdf/createPdf.js" defer></script>
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/output.css">
    <style>
        body{
            background-color: #0B111F;
            overflow-x: hidden;
        }
        html{
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>
