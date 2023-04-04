<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>/images/favicon.png">
    <title>Edit Representing Institutes</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?= base_url() ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/toastr/toastr.min.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php

        $this->load->view('components/topheader.php');
        $this->load->view('components/sidemenu.php');
        ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Edit Representing Institutes</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Institutes</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Representing Institutes</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->

                <div class="row">
                    <!-- ============================================================== -->
                    <!-- validation form -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Edit Representing Institutes Form</h5>
                            <div class="card-body">
                                <form method="post" enctype='multipart/form-data' action="<?= base_url('edit-representing-institution-data/'.$this->uri->segment(2)) ?>">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <label>Representing Countries<span style="color: red;">*</span></label>
                                            <select name="repcountryID" id="repcountryID" required class="form-control">
                                                <option value="">Please Select Country</option>
                                                <?php
                                                foreach ($repCountries as $row) {
                                                ?>
                                                    <option <?php
                                                            if ($institute[0]['repCountryID'] == $row['country_id']) {
                                                                echo 'selected=""';
                                                            }
                                                            ?> value="<?= $row['country_id'] ?>"><?= $row['country_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <label for="validationCustom01">Institute Name<span style="color: red;">*</span></label>
                                            <input type="text" value="<?= $institute[0]['uni_name'] ?>" Required class="form-control" id="instituteName" name="instituteName">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2 ">
                                            <label for="validationCustom01">Institute Type</label>
                                            <select name="inType" id="inType" class="form-control" onchange="showMasterAgent()">
                                                <option <?php
                                                        if ($institute[0]['uniType'] == 1) {
                                                            echo 'selected=""';
                                                        }
                                                        ?> value="1">Direct</option>
                                                <option 
                                                <?php
                                                        if ($institute[0]['uniType'] == 2) {
                                                            echo 'selected=""';
                                                        }
                                                        ?>
                                                value="2">Indirect</option>
                                            </select>

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Campus</label>
                                            <input type="text" value="<?= $institute[0]['uniCampus'] ?>" class="form-control" id="campus" name="campus">

                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2" id="masteragentRow" <?=($institute[0]['uniType']==1)?'style="display: none;"':''?>>
                                            <label for="validationCustom02">Select Master Agent <span style="color: red;">*</span></label>
                                            <select name="masterAgent" id="masterAgent" class="form-control">
                                                <option value="0">Select Master Agent</option>
                                                <?php
                                                if ($masterAgent) {
                                                    foreach ($masterAgent as $row) {
                                                ?>
                                                        <option 
                                                        <?php
                                                        if ($institute[0]['masterAgentID'] == $row['masterAgentID']) {
                                                            echo 'selected=""';
                                                        }
                                                        ?>
                                                        value="<?= $row['masterAgentID'] ?>"><?= $row['masterAgentName'] ?></option>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <option value="00">No Master Agents Fount Please add!</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Website</label>
                                            <input type="text" value="<?= $institute[0]['uniWebsite'] ?>" class="form-control" id="website" name="website">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Monthly Living Cost</label>
                                            <input type="text" value="<?= $institute[0]['monthlyCost'] ?>" class="form-control" id="monthlyCost" name="monthlyCost">

                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Funds Requirement for Visa</label>
                                            <input type="text" value="<?= $institute[0]['visaFunds'] ?>" class="form-control" id="fundsForVisa" name="fundsForVisa">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Application Fee</label>
                                            <input type="text" value="<?= $institute[0]['applicationFee'] ?>" class="form-control" id="appFee" name="appFee">

                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Currency</label>
                                            <select id="Currency" name="Currency" required class="form-control">
                                                <option value="">Select Currency</option>
                                                <option value="USD"  label="US dollar">USD</option>
                                                <option value="EUR" label="Euro">EUR</option>
                                                <option value="JPY" label="Japanese yen">JPY</option>
                                                <option value="GBP" label="Pound sterling">GBP</option>
                                                <option value="AED" label="United Arab Emirates dirham">AED</option>
                                                <option value="AFN" label="Afghan afghani">AFN</option>
                                                <option value="ALL" label="Albanian lek">ALL</option>
                                                <option value="AMD" label="Armenian dram">AMD</option>
                                                <option value="ANG" label="Netherlands Antillean guilder">ANG</option>
                                                <option value="AOA" label="Angolan kwanza">AOA</option>
                                                <option value="ARS" label="Argentine peso">ARS</option>
                                                <option value="AUD" label="Australian dollar">AUD</option>
                                                <option value="AWG" label="Aruban florin">AWG</option>
                                                <option value="AZN" label="Azerbaijani manat">AZN</option>
                                                <option value="BAM" label="Bosnia and Herzegovina convertible mark">BAM</option>
                                                <option value="BBD" label="Barbadian dollar">BBD</option>
                                                <option value="BDT" label="Bangladeshi taka">BDT</option>
                                                <option value="BGN" label="Bulgarian lev">BGN</option>
                                                <option value="BHD" label="Bahraini dinar">BHD</option>
                                                <option value="BIF" label="Burundian franc">BIF</option>
                                                <option value="BMD" label="Bermudian dollar">BMD</option>
                                                <option value="BND" label="Brunei dollar">BND</option>
                                                <option value="BOB" label="Bolivian boliviano">BOB</option>
                                                <option value="BRL" label="Brazilian real">BRL</option>
                                                <option value="BSD" label="Bahamian dollar">BSD</option>
                                                <option value="BTN" label="Bhutanese ngultrum">BTN</option>
                                                <option value="BWP" label="Botswana pula">BWP</option>
                                                <option value="BYN" label="Belarusian ruble">BYN</option>
                                                <option value="BZD" label="Belize dollar">BZD</option>
                                                <option value="CAD" label="Canadian dollar">CAD</option>
                                                <option value="CDF" label="Congolese franc">CDF</option>
                                                <option value="CHF" label="Swiss franc">CHF</option>
                                                <option value="CLP" label="Chilean peso">CLP</option>
                                                <option value="CNY" label="Chinese yuan">CNY</option>
                                                <option value="COP" label="Colombian peso">COP</option>
                                                <option value="CRC" label="Costa Rican colón">CRC</option>
                                                <option value="CUC" label="Cuban convertible peso">CUC</option>
                                                <option value="CUP" label="Cuban peso">CUP</option>
                                                <option value="CVE" label="Cape Verdean escudo">CVE</option>
                                                <option value="CZK" label="Czech koruna">CZK</option>
                                                <option value="DJF" label="Djiboutian franc">DJF</option>
                                                <option value="DKK" label="Danish krone">DKK</option>
                                                <option value="DOP" label="Dominican peso">DOP</option>
                                                <option value="DZD" label="Algerian dinar">DZD</option>
                                                <option value="EGP" label="Egyptian pound">EGP</option>
                                                <option value="ERN" label="Eritrean nakfa">ERN</option>
                                                <option value="ETB" label="Ethiopian birr">ETB</option>
                                                <option value="EUR" label="EURO">EUR</option>
                                                <option value="FJD" label="Fijian dollar">FJD</option>
                                                <option value="FKP" label="Falkland Islands pound">FKP</option>
                                                <option value="GBP" label="British pound">GBP</option>
                                                <option value="GEL" label="Georgian lari">GEL</option>
                                                <option value="GGP" label="Guernsey pound">GGP</option>
                                                <option value="GHS" label="Ghanaian cedi">GHS</option>
                                                <option value="GIP" label="Gibraltar pound">GIP</option>
                                                <option value="GMD" label="Gambian dalasi">GMD</option>
                                                <option value="GNF" label="Guinean franc">GNF</option>
                                                <option value="GTQ" label="Guatemalan quetzal">GTQ</option>
                                                <option value="GYD" label="Guyanese dollar">GYD</option>
                                                <option value="HKD" label="Hong Kong dollar">HKD</option>
                                                <option value="HNL" label="Honduran lempira">HNL</option>
                                                <option value="HRK" label="Croatian kuna">HRK</option>
                                                <option value="HTG" label="Haitian gourde">HTG</option>
                                                <option value="HUF" label="Hungarian forint">HUF</option>
                                                <option value="IDR" label="Indonesian rupiah">IDR</option>
                                                <option value="ILS" label="Israeli new shekel">ILS</option>
                                                <option value="IMP" label="Manx pound">IMP</option>
                                                <option value="INR" label="Indian rupee">INR</option>
                                                <option value="IQD" label="Iraqi dinar">IQD</option>
                                                <option value="IRR" label="Iranian rial">IRR</option>
                                                <option value="ISK" label="Icelandic króna">ISK</option>
                                                <option value="JEP" label="Jersey pound">JEP</option>
                                                <option value="JMD" label="Jamaican dollar">JMD</option>
                                                <option value="JOD" label="Jordanian dinar">JOD</option>
                                                <option value="JPY" label="Japanese yen">JPY</option>
                                                <option value="KES" label="Kenyan shilling">KES</option>
                                                <option value="KGS" label="Kyrgyzstani som">KGS</option>
                                                <option value="KHR" label="Cambodian riel">KHR</option>
                                                <option value="KID" label="Kiribati dollar">KID</option>
                                                <option value="KMF" label="Comorian franc">KMF</option>
                                                <option value="KPW" label="North Korean won">KPW</option>
                                                <option value="KRW" label="South Korean won">KRW</option>
                                                <option value="KWD" label="Kuwaiti dinar">KWD</option>
                                                <option value="KYD" label="Cayman Islands dollar">KYD</option>
                                                <option value="KZT" label="Kazakhstani tenge">KZT</option>
                                                <option value="LAK" label="Lao kip">LAK</option>
                                                <option value="LBP" label="Lebanese pound">LBP</option>
                                                <option value="LKR" label="Sri Lankan rupee">LKR</option>
                                                <option value="LRD" label="Liberian dollar">LRD</option>
                                                <option value="LSL" label="Lesotho loti">LSL</option>
                                                <option value="LYD" label="Libyan dinar">LYD</option>
                                                <option value="MAD" label="Moroccan dirham">MAD</option>
                                                <option value="MDL" label="Moldovan leu">MDL</option>
                                                <option value="MGA" label="Malagasy ariary">MGA</option>
                                                <option value="MKD" label="Macedonian denar">MKD</option>
                                                <option value="MMK" label="Burmese kyat">MMK</option>
                                                <option value="MNT" label="Mongolian tögrög">MNT</option>
                                                <option value="MOP" label="Macanese pataca">MOP</option>
                                                <option value="MRU" label="Mauritanian ouguiya">MRU</option>
                                                <option value="MUR" label="Mauritian rupee">MUR</option>
                                                <option value="MVR" label="Maldivian rufiyaa">MVR</option>
                                                <option value="MWK" label="Malawian kwacha">MWK</option>
                                                <option value="MXN" label="Mexican peso">MXN</option>
                                                <option value="MYR" label="Malaysian ringgit">MYR</option>
                                                <option value="MZN" label="Mozambican metical">MZN</option>
                                                <option value="NAD" label="Namibian dollar">NAD</option>
                                                <option value="NGN" label="Nigerian naira">NGN</option>
                                                <option value="NIO" label="Nicaraguan córdoba">NIO</option>
                                                <option value="NOK" label="Norwegian krone">NOK</option>
                                                <option value="NPR" label="Nepalese rupee">NPR</option>
                                                <option value="NZD" label="New Zealand dollar">NZD</option>
                                                <option value="OMR" label="Omani rial">OMR</option>
                                                <option value="PAB" label="Panamanian balboa">PAB</option>
                                                <option value="PEN" label="Peruvian sol">PEN</option>
                                                <option value="PGK" label="Papua New Guinean kina">PGK</option>
                                                <option value="PHP" label="Philippine peso">PHP</option>
                                                <option value="PKR" label="Pakistani rupee">PKR</option>
                                                <option value="PLN" label="Polish złoty">PLN</option>
                                                <option value="PRB" label="Transnistrian ruble">PRB</option>
                                                <option value="PYG" label="Paraguayan guaraní">PYG</option>
                                                <option value="QAR" label="Qatari riyal">QAR</option>
                                                <option value="RON" label="Romanian leu">RON</option>
                                                <option value="RSD" label="Serbian dinar">RSD</option>
                                                <option value="RUB" label="Russian ruble">RUB</option>
                                                <option value="RWF" label="Rwandan franc">RWF</option>
                                                <option value="SAR" label="Saudi riyal">SAR</option>
                                                <option value="SEK" label="Swedish krona">SEK</option>
                                                <option value="SGD" label="Singapore dollar">SGD</option>
                                                <option value="SHP" label="Saint Helena pound">SHP</option>
                                                <option value="SLL" label="Sierra Leonean leone">SLL</option>
                                                <option value="SLS" label="Somaliland shilling">SLS</option>
                                                <option value="SOS" label="Somali shilling">SOS</option>
                                                <option value="SRD" label="Surinamese dollar">SRD</option>
                                                <option value="SSP" label="South Sudanese pound">SSP</option>
                                                <option value="STN" label="São Tomé and Príncipe dobra">STN</option>
                                                <option value="SYP" label="Syrian pound">SYP</option>
                                                <option value="SZL" label="Swazi lilangeni">SZL</option>
                                                <option value="THB" label="Thai baht">THB</option>
                                                <option value="TJS" label="Tajikistani somoni">TJS</option>
                                                <option value="TMT" label="Turkmenistan manat">TMT</option>
                                                <option value="TND" label="Tunisian dinar">TND</option>
                                                <option value="TOP" label="Tongan paʻanga">TOP</option>
                                                <option value="TRY" label="Turkish lira">TRY</option>
                                                <option value="TTD" label="Trinidad and Tobago dollar">TTD</option>
                                                <option value="TVD" label="Tuvaluan dollar">TVD</option>
                                                <option value="TWD" label="New Taiwan dollar">TWD</option>
                                                <option value="TZS" label="Tanzanian shilling">TZS</option>
                                                <option value="UAH" label="Ukrainian hryvnia">UAH</option>
                                                <option value="UGX" label="Ugandan shilling">UGX</option>
                                                <option value="USD" label="United States dollar">USD</option>
                                                <option value="UYU" label="Uruguayan peso">UYU</option>
                                                <option value="UZS" label="Uzbekistani soʻm">UZS</option>
                                                <option value="VES" label="Venezuelan bolívar soberano">VES</option>
                                                <option value="VND" label="Vietnamese đồng">VND</option>
                                                <option value="VUV" label="Vanuatu vatu">VUV</option>
                                                <option value="WST" label="Samoan tālā">WST</option>
                                                <option value="XAF" label="Central African CFA franc">XAF</option>
                                                <option value="XCD" label="Eastern Caribbean dollar">XCD</option>
                                                <option value="XOF" label="West African CFA franc">XOF</option>
                                                <option value="XPF" label="CFP franc">XPF</option>
                                                <option value="ZAR" label="South African rand">ZAR</option>
                                                <option value="ZMW" label="Zambian kwacha">ZMW</option>
                                                <option value="ZWB" label="Zimbabwean bonds">ZWB</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Short Contract Terms</label>
                                            <input type="text" value="<?= $institute[0]['contractTerms'] ?>" class="form-control" id="contractTerms" name="contractTerms">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Long Contract Terms</label>
                                            <input type="text" value="<?= $institute[0]['contractTermsLong'] ?>" class="form-control" id="contractTermsLong" name="contractTermsLong">

                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Quality Of Application Desired</label>
                                            <select name="appQuality" id="appQuality" class="form-control">
                                                <option value="0">Select type of students</option>
                                                <option 
                                                <?php
                                                        if ($institute[0]['applicationQuality'] == 1) {
                                                            echo 'selected=""';
                                                        }
                                                        ?>
                                                value="1">Excelent</option>
                                                <option 
                                                <?php
                                                        if ($institute[0]['applicationQuality'] == 2) {
                                                            echo 'selected=""';
                                                        }
                                                        ?>
                                                value="2">Good</option>
                                                <option 
                                                <?php
                                                        if ($institute[0]['applicationQuality'] == 3) {
                                                            echo 'selected=""';
                                                        }
                                                        ?>
                                                value="3">Average</option>
                                                <option 
                                                <?php
                                                        if ($institute[0]['applicationQuality'] == 4) {
                                                            echo 'selected=""';
                                                        }
                                                        ?>
                                                value="4">Below Average</option>
                                            </select>

                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Upload Contract Copy</label>
                                            <input type="file" class="form-control" id="contractCopy" name="contractCopy">
                                            <span class="mt-2">By Uploading new it overwrite previous one!</span>
                                            

                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Contract Expiry Date</label>
                                            <input type="date" value="<?= $institute[0]['contractExpiry'] ?>" class="form-control" id="contractExpiryDate" name="contractExpiryDate">

                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Is Language Mandatory?(Eg: IELTS or TOEFL) &nbsp;&nbsp;

                                            </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" 
                                                <?php
                                                        if ($institute[0]['IeltsReq'] == 1) {
                                                            echo 'checked';
                                                        }
                                                        ?>
                                                
                                                name="ielts" id="ielts" value="1" class="custom-control-input"><span class="custom-control-label">Yes</span>
                                            </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" 
                                                <?php
                                                if ($institute[0]['IeltsReq'] == 2) {
                                                            echo 'checked';
                                                        }
                                                        ?>
                                                
                                                name="ielts" id="ielts" value="2" class="custom-control-input"><span class="custom-control-label">No</span>
                                            </label>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Language Requiremnts</label>
                                            <textarea name="LanguageReq" id="LanguageReq" class="form-control" cols="30" rows="5"><?= ($institute[0]['langRequirement']==NULL)?'No record':$institute[0]['langRequirement'] ?></textarea>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Institutional Benefits</label>
                                            <textarea name="insBenefits" id="insBenefits" class="form-control" cols="30" rows="5"><?= $institute[0]['uniBenefits'] ?></textarea>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Part Time Work Details(Mention hours permitted with estimated wages)</label>
                                            <textarea name="partTimeWork" id="partTimeWork" class="form-control" cols="30" rows="5"><?= $institute[0]['partTimeWork'] ?></textarea>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Scholarships Policy</label>
                                            <textarea name="scholarshipPolicy" id="scholarshipPolicy" class="form-control" cols="30" rows="5"><?= $institute[0]['scholarshipPolicy'] ?></textarea>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Institution Status Notes Important for Counsellor/Processing office to understand next step</label>
                                            <textarea name="insStatusNotes" id="insStatusNotes" class="form-control" cols="30" rows="5"><?= $institute[0]['uniStatusNotes'] ?></textarea>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Institution Logo</label>
                                            <input type="file" class="form-control" id="insLogo" name="insLogo">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Institution Prospectus</label>
                                            <input type="file" class="form-control" id="insProspectus" name="insProspectus">

                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">
                                            <h3>Additional Information</h3>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Informational Contact person <span style="color: red;">*</span></label>
                                            <input type="text" value="<?= $institute[0]['uniContactPerson'] ?>" required class="form-control" id="contactPersonName" name="contactPersonName">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Email <span style="color: red;">*</span></label>
                                            <input type="email" value="<?= $institute[0]['uniPersonEmail'] ?>" required class="form-control" id="contactPersonEmail" name="contactPersonEmail">
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Contact Number <span style="color: red;">*</span></label>
                                            <input type="number" value="<?= $institute[0]['uniPersonContactNo'] ?>" required class="form-control" id="contactPersonPhone" name="contactPersonPhone">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Designation <span style="color: red;">*</span></label>
                                            <input type="email" value="<?= $institute[0]['uniPersonDesignation'] ?>" required class="form-control" id="contactPersonDesignation" name="contactPersonDesignation">
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Optional Contact Information</label>
                                            <textarea name="OptionalContactInfo" id="OptionalContactInfo" class="form-control" cols="30" rows="5"><?= $institute[0]['uniPersonOtherDetail'] ?>"</textarea>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">
                                            <h3>Invoice Alarm Settings</h3>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Status</label>
                                            <select name="alarmStatus" id="alarmStatus" class="form-control">
                                                <option value="0">Select Status</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Alarm After No. of Days</label>
                                            <input type="number" value="<?= $institute[0]['uniInvoiceAfterDays'] ?>" class="form-control" id="AlarmNoOfDays" name="AlarmNoOfDays">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Commission Policy & Agreement</label>
                                            <input type="text" value="<?= $institute[0]['uniInvoiceCommisionPolicy'] ?>" class="form-control" id="commissionAgrement" name="commissionAgrement">
                                        </div>
                                    </div><br>
                                    <div class="form-row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary" type="submit" onclick="return validateType()">Update Institution</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end validation form -->
                    <!-- ============================================================== -->
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="<?= base_url() ?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="<?= base_url() ?>assets/vendor/parsley/parsley.js"></script>
    <script src="<?= base_url() ?>assets/libs/js/main-js.js"></script>
    <script>
        $('#form').parsley();
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script>
        function showMasterAgent() {
            var type = $('#inType').val();
            if (type == 2) {

                $('#masteragentRow').fadeIn();
                // $('#masteragentRow').css('display','block');
            } else {
                $('#masteragentRow').fadeOut();
            }
        }

        function validateType() {
            var type = $('#inType').val();
            if (type == 2) {
                var masterAgentID = $('#masterAgent').val();
                if (masterAgentID == 0) {
                    alert('Master Agent Not Selected!');
                    return false;
                } else {
                    return true;
                }
            }
        }
    </script>
    <script src="<?= base_url() ?>assets/toastr/toastr.min.js"></script>
    <?php
    if ($this->session->flashdata('ErrorUploadContractCOpy') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Error uploading Contract Copy,Please Try again!');
        </script>
    <?php
    }
    ?>
    <?php
    if ($this->session->flashdata('ErrorUploadUniLogo') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Error uploading Institute Logo,Please Try again!');
        </script>
    <?php
    }
    ?>
    <?php
    if ($this->session->flashdata('ErrorUploadUniProspectus') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Error uploading Institute Prospectus,Please Try again!');
        </script>
    <?php
    }
    ?>
    <?php
    if ($this->session->flashdata('uniAdded') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('New Representing Institution Added!');
        </script>
    <?php
    }
    ?>
</body>

</html>