<!DOCTYPE HTML>
<?php

function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

function secureInput($str)
{
    return htmlspecialchars(trim(strip_tags($str)), ENT_QUOTES, "UTF-8");
}

if (isset($_POST['send']) && $_POST['send'] === "Send" && isset($_POST['lastname']) && $_POST['lastname'] == "chantale") {
    // Verify inputs
    $name = secureInput($_POST['name']);
    $fname = secureInput($_POST['firstname']);
    $subject = secureInput($_POST['subject']);
    $message = secureInput($_POST['message']);
    $email = secureInput($_POST['email']);
    $ip = getUserIP();

    if (!empty($firstname) | $name=="Lackisa") {
        // Honeypot ! This field is hidden and connot be filled by I human
        $info_msg = "Thanks";
    } elseif (empty($name) || empty($message) || empty($email) || empty($subject)) {
        $msg_error = "At least one field is not filled.";
    } else {
        $formcontent = "From: ".$name." \n\n Message: \n".$message;
        $recipient = "bastiencagna@gmail.com";
        $subject = "[WEBPAGE] " . $subject;
        $mailheader = "From: $email  (IP: $ip) \r\n";
        mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
        $info_msg = "Your message have been send to me. I will read it in next hours/days. Thank you.";
        unset($_POST['name']);
        unset($_POST['subject']);
        unset($_POST['message']);
        unset($_POST['email']);
    }
}
?>
<html lang="en">

<head>
    <title>Bastien Cagna</title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.5/dist/css/foundation.min.css" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.5/dist/js/foundation.min.js" crossorigin="anonymous"></script>

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&family=Tsukimi+Rounded:wght@600&display=swap" rel="stylesheet"> 
    
    <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/home.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slide_show.css">
</head>

<body>
    <header id="page-header">
        <nav class="">
            <div class="">
                <ul class="main-nav">
                    <!--<li><a class="nav-link" href="#projects">Projects</a></li>-->
                    <li><a class="nav-link" href="#resources">Resources</a></li>
                    <li><a class="nav-link" href="#publications">Publications</a></li>
                    <li><a class="nav-link" href="#contact">Contact me</a></li>
                </ul>
            </div>
            <div class="">
                <a class="brand" href="">Bastien Cagna</a>
            </div>
        </nav>
    </header>
    

    <div id="content">
        <section class="orbit-section">
            <div class="container slideshow-container">
                <div class="slide">
                <img src="images/slide_anatomist.png" alt="Slide 1">
                </div>
                <div class="slide">
                <img src="images/slide_macapype.png" alt="Slide 2">
                </div>
                <div class="slide">
                <img src="images/slide_intertva.png" alt="Slide 3">
                </div>
            </div>
        </section>
        <!--<header>
            <img src="images/baniere_neuro.png" />
        </header>-->
        <section id="intro">
            <div class="container flex">
                <div style="width: 1000px">
                    <img src="./images/photo250.png" alt="" width="250px" height="auto" style="float: left; margin-right: 20px;" />
                </div>
                <div style="padding-left: 20px">
                    <p>With 7 years of experience in the field of medical imaging and <span class="bold">approaching the end of my current project, I am now seeking my future position.</span></p>
                    <p>Coming from an engineering background in image and signal processing, I have specialized in medical imaging and AI through various research projects I have participated in. 
                        Working in neuroimaging, I am familiar with acquisition chains, registration issues, normalization, segmentation, as well as linear and statistical modeling of volumetric and surface image series. 
                    </p>
                    <p>From preprocessing pipelines for primate MRI to AI algorithms for cortical sulcus detection, I have leveraged my collaborations to develop tools benefiting multiple teams worldwide. 
                        These diverse research endeavors have also led to participation in several international conferences and scientific publications.
                    </p>
                    <div class="cv-links">
                        <a class="cv-btn" href="./content/CV_Bastien_CAGNA_fr_low.pdf" target="__blank__">CV - Français </a>
                        <a class="cv-btn" href="./content/CV_Bastien_CAGNA_en_low.pdf" target="__blank__">CV - English </a>
                        <a href="https://www.linkedin.com/in/bastien-cagna/" target="__blank__">
                            <img src="images/logo_linkedin.png" width="36px"/> </a>
                    </div>
                </div>
            </div>
        </section>

        <div id="pubs">
            <div class="container flex">
                <div class="col-left">
                    <section id="resources">
                        <h3>Blog</h3>
                        <ul>
                            <!--<li><a href="blog/fmriprep-setup.html">Install FMRIPrep Environment</a></li>-->
                            <li><a href="blog/brainvisa-setup.html">Install Brainvisa Development Environment</a></li>
                            <li><a href="blog/nibv.html">NIBV - Nipype wraps of BrainVISA processes</a></li>
                        </ul>
                        <h3>Datasets</h3>
                        <ul>
                            <li><a target="_blank" href="https://openneuro.org/datasets/ds001771">InterTVA (link to openneuro.org)</a></li>
                            <li><a target="_blank" href="https://zenodo.org/record/2591038#.XpIBNaY6-is">VoiceLocalizer beta maps (link to zenodo.org)</a></li>
                        </ul>
                        <h3>Presentations</h3>
                        <ul>
                            <li><a href="./content/presentations/PresMacapype-RMN10092020_final.pdf">Macapype - September 2020</a></li>
                            <li><a href="./content/presentations/RMN_20_12_2018.pdf">RMN - December 2018</a></li>
                            <!--<li><a href="">RSA Analysis on block design voice localizer - 2020</a></li>-->
                        </ul>
                        <h3>Posters</h3>
                        <ul>
                            <li><a href="#">MACAPYPE: an open source framework for non human primate MRI images preprocessing - OHBM 2020</a></li>
                            <li><a href="#">Detection of individual voice patches in humans - OHBM 2019</a></li>
                        </ul>
                    </section>
                </div>
                <div class="col-right">
                    <section id="publications">
                        <header>
                            <h2>Publications</h2>
                            <a href="#">Top</a>
                        </header>
                        <ul>
                            <li><a target="_blank" href="https://fjfsdata01prod.blob.core.windows.net/articles/files/803934/pubmed-zip/.versions/2/.package-entries/fninf-16-803934-r1/fninf-16-803934.pdf?sv=2018-03-28&sr=b&sig=O051VxSEJUtdZCdmPqSfRvo2tBVhQI9egLzAXvPK3k8%3D&se=2022-10-04T20%3A28%3A13Z&sp=r&rscd=attachment%3B%20filename%2A%3DUTF-8%27%27fninf-16-803934.pdf">
                                <b>Browsing Multiple Subjects When the Atlas Adaptation Cannot Be Achieved via a Warping Strategy</b>
                                <br /><span class="authors">Denis Rivière, Yann Leprince, Nicole Labra, Nabil Vindas, Ophélie Foubet, Bastien Cagna, Kep Kee Loh, William Hopkins, Antoine Balzeau, Martial Mancip, Jessica Lebenberg, Yann Cointepas, Olivier Coulon and Jean-François Mangin. Frontiers in Neuroinformatics, 2022</span>
                                </a>
                            </li>
                            <li><a target="_blank" href="https://hal.archives-ouvertes.fr/hal-03349112/document"><b>Detection of abnormal folding patterns with unsupervised deep generative models</b><br /> <span class="authors">Louise Guillon, Bastien Cagna, Benoit Dufumier, Joël Chavas, Denis Rivière, Jean-François Mangin. International Workshop on Machine Learning in Clinical Neuroimaging, 2021</span></a></li>
                            <li><a target="_blank" href="https://www.sciencedirect.com/science/article/pii/S1053811920310041"><b>A collaborative resource platform for non-human primate neuroimaging</b><br /><span class="authors">Adam Messinger, Nikoloz Sirmpilatze et al. NeuroImage, 2021</a></li>
                            <li><a target="_blank" href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC7803954/"><b>FMRI-based identity classification accuracy in left temporal and frontal regions predicts speaker recognition performance</b><br /><span class="authors"> Virginia Aglieri, Bastien Cagna, Laurent Velly, Sylvain Takerkart, Pascal Belin. Scientific Report, 2021.</span></a></li>
                            <li><a target="_blank" href="https://www.sciencedirect.com/science/article/pii/S089662731931089X"><b>Accelerating the evolution of nonhuman primate neuroimaging</b><br /><span class="authors"> Prime-DE consortium. Neuron, 2020</span></a></li>
                            <li><a target="_blank" href="https://www.sciencedirect.com/science/article/pii/S1053811919307967"><b>Inter-subject pattern analysis: A straightforward and powerful scheme for group-level MVPA</b><br /><span class="authors"> Qi Wang, Bastien Cagna, Thierry Chaminade, Sylvain Takerkart. NeuroImage, 2020</span></a></li>
                            <li><a target="_blank" href="https://www.sciencedirect.com/science/article/pii/S2352340920300640?via%3Dihub"><b>Single-trial fMRI activation maps measured during the InterTVA event-related voice localizer. A data set ready for inter-subject pattern analysis</b><br /><span class="authors"> Virginia Aglieri, Bastien Cagna, Pascal Belin, Sylvain Takerkart. Data in brief, 2020</span></a></li>
                            <li><a target="_blank" href="https://ieeexplore.ieee.org/abstract/document/9206887"><!-- href="https://arxiv.org/pdf/2004.02804.pdf">--><b>Mapping individual differences in cortical architecture using multi-view representation learning</b><br /><span class="authors"> Akrem Sellami, François Xavier Dupé, Bastien Cagna, Hachem Kadri, Stéphane Ayache, Thierry Artières, Sylvain Takerkart. International Joint Conference on Neural Networks (IJCNN), 2020</span></a></li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>

        <!--<section id="projects">
            <header>
                <h2>Projects</h2>
                <a href="#">Top</a>
            </header>
            <ul>
                
                <li class="project">
                    <div class="illustration">
                        <img src="images/logo_ipd.png" />
                    </div>
                    <div class="content">
                        <h3>Individual Patch Detection</h3>
                        <div class="description">
                            <p>This package provides a pipeline that detect individual patches activated by a given functional task.</p>
                            <ul class="links">
                                <li><a href="https://bastiencagna.github.io/brainrsa">Publication</a></li>
                                <li><a href="https://github.com/BastienCagna/ipd">Git repository</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="project">
                    <div class="illustration">
                        <img src="images/wbv-logo.png" alt="WebBrainViewer logo" />
                    </div>
                    <div class="content">
                        <h3>Web Brain Viewer</h3>
                        <div class="description">
                            <p>A javascript viewer made to look at volumic and surfacic brain data online.</p>
                            <ul class="links">
                                <li><a target="_blank" href="http://bablab.fr/web-brain-viewer/examples">Demo</a></li>
                                <li><a target="_blank" href="http://bablab.fr/web-brain-viewer/docs">Documentation</a></li>
                                <li><a target="_blank" href="https://github.com/BastienCagna/web-brain-viewer">Git repository</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="project">
                    <div class="illustration">
                        <img src="https://github.com/BastienCagna/shpg/raw/3e50f84e079ee00ad83b614161923425c09ef3e6/doc/logo.png" alt="SHPG logo" />
                    </div>
                    <div class="content">
                        <h3>Static HTML Page Generator</h3>
                        <div class="description">
                            <p>SHPG is a python package dedicated to HTML page creation. Mainly for easy reporting purposes, it provides some simple tools to create basic HTML documents.</p>
                            <ul class="links">
                                <li><a target="_blank" href="https://bastiencagna.github.io/shpg/">Documentation</a></li>
                                <li><a target="_blank" href="https://github.com/BastienCagna/shpg">Github repository</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="project">
                    <div class="illustration">
                        <img src="images/macapype.png" alt="Macapype logo" />
                    </div>
                    <div class="content">
                        <h3>Macapype</h3>
                        <div class="description">
                            <p>The aim of this project is to create a python package that provide all the tools needed to preprocess anatomical data of non humain primate. It also aim to provide a standard pipeline for different species, starting with macaques.</p>
                            <ul class="links">
                                <li><a target="_blank" href="https://macatools.github.io/macapype/">Documentation</a></li>
                                <li><a target="_blank" href="https://github.com/Macatools/macapype">Github repository</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="project">
                    <div class="illustration">
                        <img src="images/primere.png" alt="Prime-RE logo" />
                    </div>
                    <div class="content">
                        <h3>PRIME-RE</h3>
                        <div class="description">
                            <p>PRIMate-Ressource Exchange aims to provide an overview of the main difficulties and curate a collection of solutions that currently exist within the broader NHP-MRI community for specific processing steps that are commonly performed on NHP MRI data.</p>
                            <ul class="links">
                                <li><a target="_blank" href="https://prime-re.github.io/">Web page</a></li>
                                <li><a target="_blank" href="https://github.com/PRIME-RE/prime-re.github.io/wiki">Wiki</a></li>
                                <li><a target="_blank" href="https://github.com/PRIME-RE/prime-re.github.io">Git repository</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="project">
                       <div class="illustration">
                        <img src="images/logo_brainrsa.png" alt="BrainRSA logo"/>
                    </div>
                    <div class="content">
                        <h3>BrainRSA</h3>
                        <div class="description">
                            <p>BrainRSA is a modest Python package set up to perform RSA analysis in a searchlight framework. It mainly includes brain RDM estimation, comparison to models and plottings.</p>
                            <ul class="links">
                                <li><a href="https://bastiencagna.github.io/brainrsa">Web page</a></li>
                                <li><a href="https://github.com/BastienCagna/brainrsa">Git repository</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </section>-->
        <section id="contact">
            <div class="container">
                <header>
                    <h2>Contact me</h2>
                    <a href="#">Top</a>
                </header>
                <?php
                if (isset($msg_error)) {
                    echo '<div class="failed">' . $msg_error . '</div>';
                }
                if (isset($info_msg)) {
                    echo '<div class="sucess">' . $info_msg . '</div>';
                }
                ?>

                <p>To contact, please fill all this field to make me able to answer you:</p>
                <form class="row" id="emailme" name="emailme" method="post" action="#">
                    <div class="col-md-2">
                        <label for="name">Name: </label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="name" name="name" value="<?php if (isset($name)) echo $name; ?>" />
                        <label for="firstname"></label><input type="text" id="firstname" name="firstname" value="<?php if (isset($fname)) echo $fname; ?>" />
                    </div>
                    <div class="col-md-2">
                        <label for="email">E-Mail: </label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="email" name="email" value="<?php if (isset($email)) echo $email; ?>" />
                    </div>
                    <div class="col-md-2">
                        <label for="subject">Subject: </label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" id="subject" name="subject" value="<?php if (isset($subject)) echo $subject; ?>" />
                    </div>
                    <div class="col-md-2">
                        <label for="message">Message: </label>
                    </div>
                    <div class="col-md-10">
                        <textarea id="message" name="message" rows="6"><?php if (isset($name)) echo $name; ?></textarea>
                    </div>
                    <input type="text" id="lastname" name="lastname" value="chantale" class="famtom" />
                    <p class="advert">No data will be save on any server except on my mail server.</p>
                    <input type="submit" id="send" name="send" value="Send" />
                </form>
            </div>
        </section>
    </div>

    <footer id="page-footer">
        <p>Last update: <?php echo date("D d M Y", getlastmod()); ?></p>
        <!--<a href="https://www.linkedin.com/in/bastien-cagna-a0a1066b"><img src="images/logo_linkedin.png" width=60 heigt="auto"></a>
        <a href="https://twitter.com/O_OBastien"><img src="images/logo_twitter.png" width=60 heigt="auto"></a>-->
        <p>&copy; Bastien Cagna</p>
    </footer>
</body>
<script>
  $(document).foundation();
</script>
<script src="./assets/js/slide_show.js"></script>

</html>