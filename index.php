<!DOCTYPE HTML>
<?php
function secureInput($str)
{
    return htmlspecialchars(trim($str), ENT_QUOTES, "UTF-8");
}

if (isset($_POST['send']) && $_POST['send'] === "Send") {
    // Verify inputs
    $name = secureInput($_POST['name']);
    $fname = secureInput($_POST['firstname']);
    $subject = secureInput($_POST['subject']);
    $message = secureInput($_POST['message']);
    $email = secureInput($_POST['email']);

    if (!empty($firstname)) {
        // Honeypot ! This field is hidden and connot be filled by I human
        $info_msg = "Thanks";
    } elseif (empty($name) || empty($message) || empty($email) || empty($subject)) {
        $msg_error = "At least one field is not filled.";
    } else {
        $formcontent = "From: $name \n\n Message: \n$message";
        $recipient = "bastiencagna@gmail.com";
        $subject = "[WEBPAGE] " . $subject;
        $mailheader = "From: $email \r\n";
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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/home.css">
</head>

<body>
    <header id="page-header">
        <nav class="container navbar justify-content-center">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="">Bastien Cagna <span class="text-hue">&#x40; Neuroscience</span></a>
                </div>
                <ul class="nav">
                    <li><a class="nav-link" href="#projects">Projects</a></li>
                    <li><a class="nav-link" href="#resources">Resources</a></li>
                    <li><a class="nav-link" href="#publications">Publications</a></li>
                    <li><a class="nav-link" href="#contact">Contact me</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="col-md-2">
    </div>
    <div id="content" class="container col-md-8">
        <header>
            <img src="images/baniere_neuro.png" />
        </header>
        <section id="intro">
            <div class="jumbotron">
                <p>After working almost 5 years on preprocessing and analysis of functional MRI data at the
                    <a href="http://int.univ-amu.fr">Institut de Neurosciences de la Timone in Marseille, France</a>
                    , I am now working at <a href="https://joliot.cea.fr/drf/joliot/Pages/Entites_de_recherche/NeuroSpin.aspx">
                        Neurospin in Saclays, France</a> on automatic labelling of the brain sulci using deep learning.
                    Here you can find
                    some resources that I setup during my job.
                </p>
            </div>
        </section>

        <section id="projects">
            <header>
                <h2>Projects</h2>
                <a href="#">Top</a>
            </header>
            <ul>
                <li class="project">
                    <!--   <div class="illustration">
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
                </li>-->
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
            </ul>
        </section>

        <section id="resources">
            <header>
                <h2>Resources</h2>
                <a href="#">Top</a>
            </header>
            <div class="row">
                <!--<div class="col-lg-6">
                    <header>
                        <h3>Courses &amp; Tutorials (Jupyter Notebooks)</h3>
                    </header>
                    <ul>
                        <li><a href="">Python from scratch</a></li>
                        <li><a href="">Manipulate data with Pandas</a></li>
                        <li><a href="">Representational Similiarity Anlysis in Python</a></li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <header>
                        <h3>Piece of code</h3>
                    </header>
                    <ul>
                        <li><a href="">Python utils</a></li>
                    </ul>
                </div>-->
                <div class="col-lg-6">
                    <header>
                        <h3>Blog</h3>
                    </header>
                    <ul>
                        <!--<li><a href="blog/fmriprep-setup.html">Install FMRIPrep Environment</a></li>-->
                        <li><a href="blog/brainvisa-setup.html">Install Brainvisa Development Environment</a></li>
                        <li><a href="blog/nibv.html">NIBV - Nipype wraps of BrainVISA processes</a></li>
                    </ul>
                    <header>
                        <h3>Datasets</h3>
                    </header>
                    <ul>
                        <li><a target="_blank" href="https://openneuro.org/datasets/ds001771">InterTVA (link to openneuro.org)</a></li>
                        <li><a target="_blank" href="https://zenodo.org/record/2591038#.XpIBNaY6-is">VoiceLocalizer beta maps (link to zenodo.org)</a></li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <header>
                        <h3>Presentations</h3>
                    </header>
                    <ul>
                        <li><a href="./content/presentations/PresMacapype-RMN10092020_final.pdf">Macapype - September 2020</a></li>
                        <li><a href="./content/presentations/RMN_20_12_2018.pdf">RMN - December 2018</a></li>
                        <!--<li><a href="">RSA Analysis on block design voice localizer - 2020</a></li>-->
                    </ul>
                </div>
            </div>
        </section>

        <section id="publications">
            <header>
                <h2>Publications</h2>
                <a href="#">Top</a>
            </header>
            <h3>Articles</h3>
            <h4>Machine Learning - Artificial Intelligence</h4>
            <ul>
                <li><a target="_blank" href="https://hal.archives-ouvertes.fr/hal-03349112/document"><b>Detection of abnormal folding patterns with unsupervised deep generative models</b><br /> Louise Guillon, Bastien Cagna, Benoit Dufumier, Joël Chavas, Denis Rivière, Jean-François Mangin. International Workshop on Machine Learning in Clinical Neuroimaging, 2021</a></li>
                <li><a target="_blank" href="https://arxiv.org/pdf/2004.02804.pdf"><b>Mapping individual differences in cortical architecture using multi-view representation learning</b><br /> Akrem Sellami, François Xavier Dupé, Bastien Cagna, Hachem Kadri, Stéphane Ayache, Thierry Artières, Sylvain Takerkart. Bio arXiv preprint, 2020</a></li>
                <li><a target="_blank" href="https://www.sciencedirect.com/science/article/pii/S1053811919307967"><b>Inter-subject pattern analysis: A straightforward and powerful scheme for group-level MVPA</b><br /> Qi Wang, Bastien Cagna, Thierry Chaminade, Sylvain Takerkart. NeuroImage, 2020</a></li>
            </ul>
            <h4>fMRI analysis</h4>
            <ul>
                <li><a target="_blank" href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC7803954/"><b>FMRI-based identity classification accuracy in left temporal and frontal regions predicts speaker recognition performance</b><br /> Virginia Aglieri, Bastien Cagna, Laurent Velly, Sylvain Takerkart, Pascal Belin. Scientific Report, 2021.</a></li>
                <li><a target="_blank" href="https://www.sciencedirect.com/science/article/pii/S2352340920300640?via%3Dihub"><b>Single-trial fMRI activation maps measured during the InterTVA event-related voice localizer. A data set ready for inter-subject pattern analysis</b><br /> Virginia Aglieri, Bastien Cagna, Pascal Belin, Sylvain Takerkart. Data in brief, 2020</a></li>
            </ul>
            <h4>Others</h4>
            <ul>
                <li><a target="_blank" href="https://www.sciencedirect.com/science/article/pii/S1053811920310041"><b>A collaborative resource platform for non-human primate neuroimaging</b><br />Adam Messinger, Nikoloz Sirmpilatze et al. NeuroImage, 2021</a></li>
                <li><a target="_blank" href="https://www.sciencedirect.com/science/article/pii/S089662731931089X"><b>Accelerating the evolution of nonhuman primate neuroimaging</b><br /> Prime-DE consortium. Neuron, 2020</a></li>
            </ul>
            <h3>Posters</h3>
            <ul>
                <li><a href="#"><b>MACAPYPE: an open source framework for non human primate MRI images preprocessing</b> - OHBM 2020</a></li>
                <li><a href="#"><b>Detection of individual voice patches in humans</b> - OHBM 2019</a></li>
            </ul>
        </section>

        <section id="contact">
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
                <input type="submit" id="send" name="send" value="Send" />
            </form>
            <p>No data will be save on any server except on my mail server.</p>
        </section>
    </div>
    <div class="col-md-2">
    </div>
    <footer id="page-footer">
        <p>Last update: <?php echo date("D d M Y", getlastmod()); ?></p>
        <!--<a href="https://www.linkedin.com/in/bastien-cagna-a0a1066b"><img src="images/logo_linkedin.png" width=60 heigt="auto"></a>
        <a href="https://twitter.com/O_OBastien"><img src="images/logo_twitter.png" width=60 heigt="auto"></a>-->
        <footer>
            <p>&copy; Bastien Cagna</p>
        </footer>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>