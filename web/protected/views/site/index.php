<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>
<section class="grid-wrap" >
    <header class="grid col-full">
        <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
        )); ?><!-- breadcrumbs -->
        <?php endif?><!-- breadcrumbs -->
    </header>
    <div class="grid col-one-half mq2-col-full">
			<script type="text/javascript" charset="utf-8">
					window.onload = function () {
						var R = Raphael("paper", 650, 650);
						var attr = {
							fill: "#015C3B",
							stroke: "#ccc",
							"stroke-width": 1,
							"stroke-linejoin": "round"
						};
						var asia = {};
						asia.uz = R.path("m 347.35725,540.10567 c -1.67961,0.007 -3.0169,0.57313 -4.29056,-0.5413 -0.60496,-0.5174 -0.62883,-1.17014 -0.45371,-1.87062 0.3184,-1.28957 1.29752,-2.77812 0.45371,-4.01193 -1.3532,-2.04576 -3.46266,-1.83882 -5.88253,-2.14926 -2.92936,-0.38208 -4.67262,1.89452 -7.49848,1.07463 -1.61593,-0.46966 -2.79402,-0.76419 -3.7572,-2.14129 -1.09852,-1.55222 -0.31842,-2.94527 -0.53334,-4.82386 l -0.54131,-2.14129 c -3.96414,0.62089 -6.18505,1.02686 -10.15715,1.60798 -3.15223,0.44575 -5.20597,-0.31048 -8.04773,1.05868 -3.32735,1.61592 -2.75422,6.68655 -6.4557,6.97311 -1.6955,0.1353 -2.56318,-0.87561 -4.2746,-1.07462 -2.49154,-0.2786 -3.91641,0.70049 -6.42387,0.54129 -2.78605,-0.18308 -4.8557,0.199 -6.9731,-1.60795 -3.50247,-2.98508 1.97411,-7.64177 0,-11.789 -1.32139,-2.80995 -3.04876,-3.82089 -5.3572,-5.89851 -3.00893,-2.7144 -5.72335,-3.01689 -8.57311,-5.89051 -2.53927,-2.54725 -1.78309,-7.20396 -5.35718,-7.50644 -3.14427,-0.26268 -3.34327,4.29849 -6.43977,4.82387 -1.85472,0.31841 -2.99303,-0.0958 -4.81592,-0.53334 -2.20497,-0.52537 -3.23978,-1.39302 -5.35719,-2.14128 -4.87161,-1.72736 -7.75319,-2.53134 -12.87157,-3.21592 -3.29553,-0.45372 -5.21393,-0.76417 -8.55722,-0.54129 -3.85272,0.26268 -5.9303,1.13831 -9.64771,2.1413 -2.10944,0.57312 -3.19202,1.50447 -5.36515,1.61591 -3.5582,0.16717 -6.4318,-0.36617 -8.58105,-3.21592 -0.94726,-1.27362 -1.07463,-2.25272 -1.60001,-3.75718 -0.93929,-2.62685 0.35026,-4.99103 -1.60794,-6.96516 -1.97414,-1.96616 -4.67262,-0.0162 -6.96514,-1.60797 -1.57612,-1.08258 -1.95819,-2.26067 -3.16019,-3.70146 -0.59701,0.20696 -1.17015,0.43781 -1.65572,1.02685 -1.74327,2.1015 -0.33433,4.24279 -0.52537,6.96517 -0.23086,3.1363 2.02189,6.24077 -0.54924,8.03975 -1.87861,1.30547 -3.64577,-0.50944 -5.88257,0 -2.0219,0.44578 -2.83383,2.64277 -4.82387,2.13335 -1.87859,-0.46966 -1.56019,-2.76219 -3.22386,-3.74129 -1.47264,-0.88359 -2.5393,-1.13035 -4.28258,-1.07464 -1.50446,0.0479 -2.2368,0.82788 -3.75719,1.07464 -2.88954,0.46169 -6.55122,2.2368 -7.49054,-0.54128 -0.54127,-1.63185 1.33733,-2.57912 1.08261,-4.28257 -0.46171,-2.93732 -4.91144,-2.0219 -5.89052,-4.82388 -0.62888,-1.77511 0.0398,-2.94526 0,-4.82386 -0.0958,-2.72236 -0.45375,-4.24278 -0.54927,-6.96515 l 0,-1.07462 c -3.12835,0.42188 -5.28556,-0.48557 -8.03977,1.07462 -1.1542,0.66069 -1.48854,1.53631 -2.67462,2.14129 -2.23679,1.14626 -4.02782,1.28957 -6.42384,0.53332 0,0 -1.74328,5.50845 -1.60795,9.1144 0.13528,4.82388 2.48356,7.13231 3.74127,11.78901 0.96318,3.52635 1.28159,5.55621 2.1572,9.10643 0.59701,2.51541 1.7592,3.85273 1.59203,6.43181 -0.13527,2.4438 -1.75122,3.47859 -2.14127,5.89849 -0.57314,3.52635 0.6607,5.55619 1.08257,9.10644 l 1.08258,0.0952 c 0.83582,-0.20696 1.65572,-0.35819 2.65075,-0.0952 2.73828,0.70843 2.56315,4.95122 5.38106,4.82386 2.4995,-0.11935 2.90546,-2.62687 4.81592,-4.28258 4.13133,-3.62187 6.13727,-6.09748 10.71438,-9.11439 3.74923,-2.47561 5.76315,-4.64875 10.18901,-5.35719 4.16317,-0.66865 7.09252,-0.57314 10.7303,1.60797 3.03284,1.83084 3.23979,4.57709 5.86664,6.96514 2.12538,1.90246 3.89253,2.28455 5.89054,4.29051 1.71143,1.67165 2.53133,2.77014 3.75719,4.82388 0.78009,1.27364 0.90747,2.68257 1.05075,4.01193 0.17514,1.86267 0.35024,3.56614 2.16516,4.55322 2.99301,1.61592 5.22187,-2.12537 8.58106,-1.60797 4.59303,0.71642 6.05769,4.01988 9.63975,6.96514 3.76519,3.10447 5.61989,5.18209 9.12235,8.58107 3.39903,3.29551 5.3572,5.10245 8.56515,8.5731 1.71145,1.84676 2.71441,2.8577 4.29055,4.82385 2.33232,2.95325 2.50743,5.57214 5.34923,8.03976 1.85471,1.6 3.23183,2.0219 5.37311,3.20798 2.84973,1.592 4.41789,2.6587 7.49846,3.7572 2.42785,0.85968 3.86069,1.38506 6.43182,1.59998 2.70648,0.24677 4.2348,-0.60496 6.96516,-0.52536 2.94526,0.0795 4.59299,0.51741 7.49848,1.06664 1.88655,0.36617 3.48654,-0.31839 4.82386,1.06669 1.18606,1.24973 0.76418,2.59499 1.07462,4.29848 0.47761,2.67461 0.32636,4.24277 0.52536,6.95718 l 0,0.54129 c 1.6796,-0.20696 2.61891,-0.78806 4.2826,-0.54129 1.56814,0.2388 2.18902,1.29751 3.76514,1.60794 1.4169,0.28659 2.30051,0.11144 3.73331,0 1.49651,-0.10356 2.30052,-0.76415 3.76518,-0.53331 1.0587,-1.87862 1.75919,-2.88158 2.69053,-4.82387 0.67661,-1.43282 1.24178,-2.197 1.59999,-3.74924 0.4776,-2.0378 0.39005,-3.31142 0,-5.36515 -0.49355,-2.46766 -0.58906,-4.45769 -2.69055,-5.89053 -1.40893,-0.97909 -2.59499,-0.67661 -4.27459,-1.06666 -1.87065,-0.44576 -3.42289,0.24676 -4.81591,-1.07462 -1.84677,-1.72736 -1.28159,-4.02783 -0.5413,-6.43181 0.70847,-2.27661 2.197,-3.02487 3.76516,-4.82387 1.92636,-2.22884 3.04876,-3.51043 5.35721,-5.35718 1.75919,-1.40896 3.82884,-1.18606 4.81589,-3.21592 0.55722,-1.14627 0.31841,-1.95819 0.53333,-3.2159 0.19901,-1.2577 0.15116,-1.99799 0.52537,-3.2159 0.86765,-2.70646 1.76717,-4.60896 4.29053,-5.89055 2.0617,-1.05072 3.72536,-1.32138 5.89054,-0.54125 1.8149,0.66067 2.29251,1.96614 3.74922,3.21588 l 1.08258,1.60796 c 1.45672,0.21491 2.28457,0.4378 3.75722,0.54129 2.71442,0.17512 4.25072,-0.23085 6.95717,-0.54129 2.73034,-0.31044 4.31441,-0.37414 6.96515,-1.07463 2.80993,-0.73231 4.91142,-0.62088 6.96513,-2.67462 2.20499,-2.18904 5.19005,-5.68356 2.6826,-7.49848 -1.93432,-1.37711 -3.598,1.05871 -5.93032,1.06667").attr(attr);
						asia.kz = R.path("m 251.97056,504.20531 c 1.82285,0.43781 2.96116,0.85175 4.81588,0.53334 3.09651,-0.52538 3.29551,-5.08655 6.43981,-4.82387 3.57408,0.30248 2.81787,4.95919 5.35716,7.50644 2.84974,2.87362 5.56416,3.17611 8.5731,5.89051 2.30846,2.07762 4.03582,3.08856 5.3572,5.89851 1.97413,4.14723 -3.50248,8.80392 0,11.789 2.11741,1.80695 4.18705,1.42487 6.97312,1.60795 2.4995,0.15926 3.92437,-0.81989 6.42384,-0.54129 1.71145,0.19901 2.5791,1.20995 4.27462,1.07462 3.70148,-0.28656 3.12836,-5.35719 6.4557,-6.97311 2.83382,-1.36916 4.89548,-0.61293 8.04771,-1.05868 3.97214,-0.58112 6.19304,-0.98709 10.15719,-1.60798 l 0.54129,0.53335 c 2.51543,-1.47265 4.21888,-1.87064 6.42386,-3.7572 2.26067,-1.9184 2.84974,-3.6776 4.82384,-5.89052 2.56318,-2.86566 3.36716,-5.6199 6.96517,-6.96516 2.36416,-0.88357 3.91639,-0.58109 6.43182,-0.53333 2.11741,0.032 3.27955,0.82787 5.36514,0.53333 2.79402,-0.39803 3.95621,-1.90247 6.43977,-3.21591 1.90248,-1.01095 2.73832,-2.12536 4.8159,-2.68256 4.41789,-1.18608 6.82187,2.06168 11.2557,3.2159 4.37012,1.14627 6.79001,2.06167 11.23975,2.68257 2.50745,0.34228 3.93233,0.44576 6.44772,0.53334 2.09355,0.0796 3.27961,-0.2627 5.3572,0 3.27163,0.41391 4.90347,1.63184 8.02386,2.68258 2.52337,0.8358 3.85271,1.59203 6.43977,2.14127 3.48653,0.7403 5.54824,0.6368 9.12234,0.53332 3.57414,-0.10356 5.54825,-1.35322 9.10644,-1.06665 2.14129,0.16717 3.26371,0.64476 5.36521,1.06665 l 1.59992,-0.53332 c 0.21494,-3.55024 1.18608,-5.61191 0.53331,-9.11439 -0.43774,-2.40398 -0.97902,-3.74128 -2.14121,-5.89052 -1.54428,-2.87362 -3.70947,-3.61392 -5.36519,-6.43183 -1.36914,-2.34027 -0.42189,-4.91141 -2.6746,-6.42383 -1.27365,-0.85971 -2.5393,-0.13528 -3.74925,-1.07465 -0.32637,-0.24676 -0.60498,-0.51741 -0.83582,-0.80396 -1.23381,-1.42486 -1.60795,-3.30349 -0.77215,-5.09451 0.91543,-1.95026 4.32377,-0.0859 6.32178,-0.83411 4.1154,-1.54429 3.99323,-2.98631 8.24395,-1.87984 2.44375,0.63682 2.36305,2.75515 4.71133,3.67851 2.46765,0.9791 7.21439,2.47422 9.12483,0.64339 1.85469,-1.799 -0.72435,-3.99601 -1.608,-6.43181 -0.96307,-2.63482 -2.30836,-3.77313 -3.21589,-6.43182 -1.71143,-4.95122 -2.6985,-8.40595 -1.08254,-13.38901 1.08254,-3.31142 1.34526,-7.66564 4.83185,-7.50645 1.96609,0.0876 2.33225,2.45175 4.2825,2.67463 1.24982,0.15132 1.95028,-0.35821 3.19997,-0.53333 2.50748,-0.35024 3.96424,-1.04277 6.44782,-0.5413 2.55516,0.53336 3.31934,3.71741 5.88254,3.2239 2.48358,-0.46967 3.48649,-2.43583 4.29048,-4.8239 0.66872,-1.97409 0.51749,-3.3353 0,-5.36515 -0.59691,-2.35619 -2.73822,-2.96116 -3.20793,-5.35717 -0.16715,-0.80398 -0.19104,-1.48061 -0.15112,-2.13333 0.0797,-1.02685 0.37412,-1.98207 0.6686,-3.22386 1.36916,-5.34924 4.12343,-8.0159 8.58106,-11.24771 3.50251,-2.53132 0.18174,-0.37525 3.16168,-1.94809 1.88473,-1.92744 1.69138,-1.67318 2.14179,-4.01564 l 1.06913,-2.91513 c 0.25696,-2.12597 0.75198,-3.2048 -0.17015,-4.33487 0,0 0.82196,1.83666 -0.63846,-1.42766 0.64222,1.58683 0.46191,-0.19638 -0.74,-1.43815 -1.32137,-1.39304 -2.95318,-0.57313 -4.82388,-1.07463 -2.54719,-0.68457 -3.80496,-2.49949 -6.41586,-2.14128 -1.58412,0.21491 -2.3881,0.81988 -3.7731,1.60794 -2.69055,1.53632 -2.82584,4.81592 -5.88255,5.34923 -3.15227,0.56519 -4.79999,-1.5363 -7.49852,-3.20793 -2.54728,-1.55224 -3.1682,-3.66168 -5.90643,-4.82388 -1.75921,-0.75619 -3.04078,-0.29451 -4.80797,-1.06666 -1.1144,-0.49352 -1.67957,-0.89152 -2.66665,-1.60794 -1.93432,-1.38509 -2.15722,-3.28754 -4.29844,-4.29054 -2.65879,-1.23383 -4.58506,-0.23085 -7.50649,0 -2.73034,0.22288 -4.28257,0.49353 -6.95718,1.07464 -2.32439,0.50149 -3.62188,0.94724 -5.90645,1.60793 -2.09353,0.59703 -3.29551,0.85176 -5.36514,1.60797 -2.79403,1.02685 -4.05969,3.98007 -6.96517,3.20794 -1.44078,-0.38207 -1.96614,-1.28953 -3.19999,-2.14127 -1.48057,-1.01892 -1.9582,-2.61891 -3.76515,-2.67464 -2.3562,-0.0795 -2.80994,2.42787 -4.27459,4.28257 -1.49651,1.92635 -1.46469,3.66965 -3.21592,5.36516 -2.02191,1.94229 -3.63781,3.55821 -6.43182,3.20794 -2.2448,-0.27064 -2.88156,-2.06166 -4.82386,-3.20794 -2.80993,-1.67958 -4.70446,-2.05372 -7.49848,-3.74924 -2.1811,-1.32936 -2.92935,-2.95322 -5.34922,-3.75719 -1.01095,-0.32636 -1.69555,-0.14323 -2.68259,-0.53333 -3.22388,-1.28158 -2.53134,-4.88754 -4.83182,-7.50643 -1.83881,-2.10946 -3.5582,-2.6587 -5.34127,-4.82388 -0.0795,-0.0874 -0.16716,-0.17511 -0.21492,-0.26266 -1.93434,-2.49951 -1.80696,-4.90349 -4.08357,-7.2358 -2.66666,-2.75422 -5.26168,-2.88159 -8.58105,-4.82387 -4.44179,-2.61093 -6.75819,-4.41788 -11.23977,-6.96513 -2.69053,-1.52042 -4.09949,-2.61891 -6.96515,-3.74925 -3.20796,-1.26567 -5.90645,0.0398 -8.58105,-2.14926 -2.39603,-1.95024 -1.2418,-5.14227 -3.74925,-6.96514 -2.25272,-1.6398 -4.17908,-1.50449 -6.96515,-1.60796 -2.74626,-0.0956 -4.394,0.10356 -6.98108,1.07462 -2.5313,0.96319 -3.5741,2.30049 -5.87459,3.74926 -2.71441,1.69549 -3.81291,3.74127 -6.98107,4.29051 -1.44079,0.23881 -2.32438,0.35823 -3.74128,0 -2.73033,-0.68457 -3.32734,-2.88156 -5.36516,-4.82386 -1.4965,-1.42486 -2.02187,-2.6189 -3.74923,-3.74923 -2.20494,-1.45671 -3.81292,-1.81492 -6.43182,-2.14924 -2.70647,-0.3423 -4.27461,0.86765 -6.96514,0.54131 -1.05075,-0.12731 -1.6955,-0.16718 -2.69055,-0.54131 -3.05671,-1.14627 -3.23182,-3.94825 -5.35718,-6.42385 -1.44078,-1.69552 -1.99003,-2.9214 -3.73332,-4.29054 -1.3373,-1.03482 -2.23681,-1.42487 -3.77311,-2.14129 -2.56319,-1.20994 -4.13135,-2.38008 -6.96516,-2.14925 -2.22885,0.19105 -3.20793,1.43283 -5.36516,2.14925 -1.44079,0.47761 -2.23678,0.82786 -3.74126,1.07463 -2.06965,0.32637 -3.49452,-0.93929 -5.3572,0 -1.87861,0.93134 -1.60794,2.94526 -3.22388,4.28257 -2.67461,2.24475 -5.23778,1.59203 -8.58103,2.67461 -1.23385,0.41393 -1.95026,0.66069 -3.20796,1.07462 -1.24976,0.42189 -1.93432,0.72435 -3.19999,1.07463 -2.47563,0.66866 -3.98007,0.37413 -6.44774,1.06667 -2.6189,0.74825 -3.77313,2.05372 -6.41589,2.68256 -2.46766,0.58111 -3.93233,0.35026 -6.43981,0.53333 -3.34325,0.25474 -6.27258,-1.90246 -8.55713,0.5413 -0.97118,1.01891 -0.5652,2.30844 -1.61595,3.21592 -1.75919,1.48056 -3.60596,0 -5.89846,0 -3.14426,0 -5.24576,-1.42488 -8.04773,0 -2.23683,1.1383 -4.54526,2.3164 -4.27463,4.81588 0.20697,1.9184 1.61592,2.67461 3.19998,3.75721 1.65574,1.10646 3.13631,0.57314 4.81593,1.60795 1.76713,1.07461 3.51041,1.69552 3.7572,3.74127 0.23084,1.86271 -0.57314,3.25573 -2.14926,4.29054 -1.73532,1.16219 -3.29549,-0.398 -5.35721,0 -2.48355,0.48556 -5.3333,0.2229 -5.89847,2.68256 -0.32635,1.48061 0.35822,2.41196 1.07462,3.75721 0.63682,1.17014 1.76716,1.38507 2.1572,2.67463 0.2627,0.85971 0.23883,1.66367 0.0238,2.41194 -0.32637,1.11441 -1.13032,2.10146 -2.18108,2.94526 -1.64775,1.33728 -4.06764,-0.63683 -5.34924,1.07461 -1.40099,1.87064 -0.58903,4.24276 1.06666,5.89053 1.65573,1.65571 3.64579,0.42189 5.8985,1.0746 1.71143,0.49355 2.595,1.01097 4.27461,1.60797 1.88657,0.66069 3.99602,-0.19103 4.82385,1.60794 0.61293,1.33734 0.1273,2.41988 -0.53334,3.74924 -1.52038,3.15223 -5.11838,2.0617 -8.56512,2.68258 -2.89751,0.50945 -4.67262,1.29751 -7.49847,0.53334 -2.08557,-0.56517 -2.90548,-1.69553 -4.82387,-2.68258 -2.65074,-1.36914 -4.00396,-2.7144 -6.96516,-3.21592 -2.68257,-0.44575 -4.2746,0.10356 -6.95717,0.53334 -4.31443,0.69254 -6.43181,2.44378 -10.73032,3.22388 -5.34925,0.96317 -8.51737,-0.0163 -13.92232,0.53333 -4.21893,0.42188 -6.59899,2.53931 -10.730315,1.60795 -2.754233,-0.61293 -3.725385,-2.49153 -6.431814,-3.21592 -2.427874,-0.66069 -4.123371,0.46171 -6.423868,-0.54128 -3.279588,-1.39303 -3.40696,-4.43381 -5.906445,-6.96515 -2.70646,-2.73829 -3.789041,-5.42883 -7.498477,-6.42385 -2.817888,-0.76419 -4.616896,0.0162 -7.498491,0.53333 -3.454698,0.6209 -5.142258,1.97411 -8.565136,2.68258 -5.747242,1.17811 -9.966132,-2.45174 -15.012874,0.53333 -1.902468,1.13033 -2.817885,2.07759 -4.2746,3.74925 -2.786069,3.16813 -2.555223,6.09745 -4.831834,9.64771 -1.679587,2.64277 -2.372113,4.47361 -4.831824,6.43181 -2.324367,1.86269 -4.067637,3.98009 -6.965138,3.21592 -2.276591,-0.60501 -1.934324,-3.98805 -4.266646,-4.29056 -1.50448,-0.18306 -2.547258,0.1273 -3.765153,1.07464 -0.811943,0.63682 -1.106473,1.22586 -1.6079564,2.14129 -1.393029,2.5791 -0.8517334,4.593 -0.5174103,7.49849 0.4537163,4.01191 1.0427767,6.65468 3.7412687,9.64771 1.528362,1.70346 3.24776,1.8547 4.815914,3.22386 0.175116,0.15117 0.366169,0.3343 0.533331,0.52537 2.340278,2.56317 3.287533,4.6169 3.765154,8.03977 0.342287,2.49153 -0.652747,3.9164 -0.541295,6.43181 0.199008,4.0995 -0.14253,4.16907 1.728119,7.82279 0.557203,1.07462 1.164525,3.87976 1.970845,5.21832 l 0.872556,0.92286 c 0.889368,0.24024 1.143923,0.0619 1.860344,-0.56701 2.467654,-2.14925 2.523376,-4.82385 5.349225,-6.43183 3.13631,-1.75918 5.603947,-0.4139 9.130309,-1.06665 1.894533,-0.35025 3.080588,-0.23879 4.807941,-1.0746 3.367155,-1.61593 2.252729,-6.69453 5.890521,-7.49848 1.85473,-0.41394 2.969149,0.10356 4.82387,0.5333 3.63779,0.84379 4.839772,4.03582 8.581054,4.28259 3.478607,0.2388 5.381093,-4.09949 8.557205,-2.68259 2.037775,0.90748 2.730321,2.32438 3.757179,4.29053 1.838813,3.51842 0.461709,6.20893 0.533337,10.18107 0.05578,2.51542 -1.026858,4.14725 0,6.43182 0.66865,1.48855 3.184053,1.66367 2.690531,3.21589 -0.581081,1.79902 -2.945263,-0.33431 -4.823865,-0.53332 -2.101486,-0.22289 -3.279576,-0.32636 -5.365155,-0.5333 -2.093506,-0.21497 -3.263656,-0.67665 -5.349232,-0.53336 -1.926359,0.11937 -3.44674,-0.27064 -4.823858,1.06666 -1.552239,1.47264 -1.655715,3.30348 -1.066662,5.35721 0.684587,2.41989 4.585047,1.77511 4.807941,4.28255 0.08764,0.95523 0.08764,1.65573 -0.37413,2.4199 -0.04772,0.0875 -0.09557,0.17511 -0.167151,0.26268 -1.21791,1.70347 -3.311432,0.44576 -5.349249,0 -0.278586,-0.0558 -0.549253,-0.14322 -0.772135,-0.26268 -1.496491,-0.72438 -2.348244,-2.33235 -4.059678,-1.8786 -1.209939,0.31046 -1.990035,0.84378 -2.547258,1.8786 -0.04778,0.0875 -0.09557,0.17511 -0.135275,0.26268 -0.971159,2.03781 0.246764,4.14724 2.141267,5.35719 1.424886,0.92337 2.873626,-0.39799 4.290553,0.53332 1.544268,1.04279 1.114407,2.7383 2.157196,4.29055 0.73232,1.12239 1.154211,1.77512 2.133323,2.68256 1.576113,1.46468 3.582072,0.92338 4.831815,2.68258 1.098518,1.56815 -0.405963,3.56616 1.058703,4.81591 1.767159,1.51243 4.051737,-1.90248 5.906456,-0.53333 1.59202,1.18608 0.493522,3.16815 1.60795,4.82387 0.811929,1.23383 1.361184,2.00597 2.666659,2.68258 2.24474,1.1383 4.481587,-2.13335 6.431805,-0.54131 0.947277,0.77214 1.209951,1.53632 1.599997,2.68258 0.716429,1.96616 -0.222883,3.2796 0,5.35719 l 1.615905,0.5413 c 3.76517,-0.21495 5.882569,-0.64478 9.655703,-0.5413 2.515408,0.0636 4.059688,-0.31043 6.423848,0.5413 1.58408,0.56517 2.12539,1.73531 3.76519,2.14128 2.02983,0.50946 3.47062,-1.48856 5.35717,-0.54128 1.60795,0.8199 1.30548,2.58704 2.67463,3.7572 2.90544,2.46765 6.24872,-0.1273 9.64771,1.60794 2.11741,1.07464 2.65073,2.7781 4.82386,3.74924 2.13333,0.94727 3.55027,0.99502 5.88258,1.07462 1.04277,0.0238 1.88654,-0.23083 2.69849,-0.44577 l -1.0826,-0.0955 c -0.42188,-3.55025 -1.6557,-5.5801 -1.08257,-9.10643 0.39006,-2.4199 2.00597,-3.45473 2.14129,-5.89851 0.16716,-2.57909 -0.99502,-3.91638 -1.59203,-6.43181 -0.86767,-3.55023 -1.18606,-5.58006 -2.15723,-9.10644 -1.25766,-4.65668 -3.60593,-6.96514 -3.74126,-11.78899 -0.0479,-1.37713 0.16717,-3.0408 0.46964,-4.55321 0.48559,-2.45971 1.14626,-4.56119 1.14626,-4.56119 2.39603,0.75623 4.17909,0.61294 6.42387,-0.53332 1.18607,-0.60499 1.52041,-1.4806 2.67461,-2.1413 2.7383,-1.56019 4.90345,-0.66068 8.00793,-1.06666 -0.007,-1.4806 0.0319,-2.59502 0.0319,-4.29052 0,-1.67165 -0.74032,-2.79403 0,-4.29055 0.89153,-1.76713 2.34824,-2.30844 4.28255,-2.67461 1.66369,-0.31841 2.77014,1.2179 4.29849,0.53333 2.04579,-0.92339 0.20697,-4.21092 2.14129,-5.3572 1.63183,-0.96317 3.62188,1.44877 4.81592,0 1.24177,-1.48853 -1.30548,-2.91342 -1.05871,-4.82384 0.19104,-1.58408 0.42986,-2.68259 1.59205,-3.75722 1.71938,-1.54426 3.82085,-1.54426 5.90643,-0.53331 2.03781,0.995 0.95521,4.52136 3.19999,4.82385 1.30545,0.17512 2.10149,-0.37412 3.23182,-1.06665 1.76718,-1.10646 1.21791,-3.67761 3.20795,-4.29056 0.99503,-0.31042 1.71143,-0.38207 2.68257,0 2.64278,1.03484 -1.48057,4.20298 -2.1572,6.96518 -0.49354,2.06961 -0.97909,3.23182 -1.07463,5.35718 -0.11144,2.74626 -0.60496,4.79202 1.07463,6.96514 1.20995,1.56815 2.62685,1.6159 4.29055,2.68256 1.27361,0.81992 2.18903,1.04279 3.22385,2.14132 1.26567,1.36915 2.13332,2.41989 2.13332,4.28257 0,1.87062 -0.83583,2.96117 -2.13332,4.29847 -0.50148,0.5015 -1.04278,0.72439 -1.60794,0.92338 l -0.54132,0.14324 c 0.0796,0.0958 0.15927,0.18307 0.22289,0.27064 1.08259,1.33729 1.50449,2.45172 2.99303,3.47858 2.29255,1.59204 4.99104,-0.35822 6.96516,1.60795 1.9582,1.97412 0.66866,4.33831 1.60796,6.96517 0.52536,1.50447 0.65271,2.48355 1.59999,3.75721 2.15719,2.84974 5.02285,3.38303 8.58103,3.21588 2.16518,-0.11144 3.25573,-1.04279 5.36517,-1.6159 3.71739,-1.00298 5.795,-1.87862 9.64772,-2.14129 3.34329,-0.22289 5.26167,0.0875 8.55719,0.54131 5.12635,0.68454 7.99997,1.48853 12.87159,3.21588 2.12538,0.74826 3.16019,1.61592 5.36515,2.14128").attr(attr);
						asia.tj = R.path("m 394.51328,584.5871 c -3.44676,-1.74331 -5.81887,2.72237 -9.63977,2.14126 -3.23182,-0.49354 -5.47659,-1.17808 -7.49849,-3.74923 -2.23679,-2.84177 -0.82784,-5.58803 -1.61591,-9.10643 -0.70049,-3.16813 -1.30546,-4.91142 -2.14128,-8.03978 l -0.62884,0.0558 c -1.82288,1.22587 -4.25869,-0.52535 -6.85371,-0.597 -3.58207,-0.0957 -5.5721,-0.73236 -9.13031,-0.53336 -3.59003,0.19902 -5.49252,1.29752 -9.09848,1.60797 -3.54227,0.31046 -5.66765,0.88357 -9.12235,0 -2.44375,-0.62885 -3.48656,-1.85473 -5.88256,-2.68257 -2.62686,-0.90749 -4.47361,-0.35821 -6.96515,-1.60796 -1.86269,-0.93134 -2.96119,-1.59202 -4.28259,-3.21591 -0.78009,-0.94726 -0.97111,-1.63183 -1.60793,-2.67461 l 2.68255,-2.14925 c 0.82788,-1.24974 3.63605,-3.19401 3.13114,-3.86825 l -0.99779,-1.48894 c -1.45671,-1.24974 -1.93433,-2.55522 -3.74924,-3.2159 -2.16515,-0.78009 -3.82884,-0.50946 -5.89054,0.54128 -2.52336,1.28159 -3.42285,3.18405 -4.29051,5.89053 -0.38209,1.21791 -0.32639,1.9582 -0.52538,3.21591 -0.21492,1.2577 0.0238,2.06964 -0.53332,3.21588 -0.98707,2.02987 -3.06467,1.80696 -4.81591,3.21592 -2.30845,1.84675 -3.43081,3.12836 -5.35719,5.3572 -1.56018,1.799 -3.05669,2.54726 -3.76513,4.82387 -0.74032,2.40397 -1.3055,4.70444 0.54125,6.43181 1.401,1.32139 2.94528,0.62885 4.81591,1.07462 1.6796,0.39005 2.86567,0.0877 4.27461,1.06666 2.1015,1.43282 2.19702,3.42288 2.69055,5.89051 0.39004,2.05376 0.47761,3.32738 0,5.36516 -0.35823,1.55224 -0.92339,2.31642 -1.6,3.74925 -0.93136,1.94227 -1.63184,2.94526 -2.69053,4.82386 2.36415,0.38208 2.50743,3.22387 4.8318,3.74924 1.21792,0.27862 1.96619,0.22289 3.20794,0 1.55225,-0.2786 2.25272,-1.05074 3.75721,-1.60796 2.02985,-0.7562 3.17612,-1.32933 5.34924,-1.60795 1.66367,-0.21491 2.66666,0.41394 4.29053,0 3.43879,-0.85968 5.57211,-2.99304 6.42384,-6.43181 0.85971,-1.09852 1.24178,-1.86267 1.61592,-3.20795 0.66865,-2.42784 -2.53133,-4.8955 -0.53333,-6.43182 1.16218,-0.90745 2.28458,-0.7005 3.74924,-0.54129 2.41989,0.27862 3.08854,2.31641 5.34924,3.22387 1.4169,0.5572 2.51541,0.19899 3.7572,1.06666 1.12238,0.76418 1.20995,1.7194 2.15721,2.68258 1.76715,1.82286 3.98803,1.59204 5.34924,3.74924 1.90247,3.001 -1.10647,5.73132 0,9.10643 0.66864,2.04576 1.02686,3.45472 2.6746,4.82386 3.24774,2.68259 7.3154,1.37712 10.73031,-1.07461 1.92637,-1.38506 2.17313,-3.03284 3.7572,-4.81592 1.55221,-1.77509 2.1811,-3.192 4.29052,-4.29053 2.06965,-1.07461 3.87662,-2.27658 5.87461,-1.06663 1.29752,0.78006 0.89951,2.36414 2.15722,3.20792 2.06962,1.41693 3.9164,-0.7801 6.41588,-0.53333 2.38009,0.22288 3.53431,1.93434 5.89052,1.60795 2.82586,-0.39004 5.22983,-1.52039 5.90647,-4.28254 0.58106,-2.38011 -1.10649,-3.68558 -2.14926,-5.89852 -1.36914,-2.88952 -1.46467,-5.5323 -4.30645,-6.96514").attr(attr);
						asia.kg = R.path("m 325.9205,562.07572 c 2.49155,1.24978 4.33831,0.7005 6.96516,1.60796 2.396,0.82786 3.44674,2.05374 5.88256,2.68258 3.46268,0.88358 5.58007,0.31044 9.12235,0 3.59801,-0.31044 5.50048,-1.40897 9.09847,-1.60795 3.5582,-0.19901 5.54824,0.43781 9.13032,0.53333 2.91343,0.0796 5.65173,2.2766 7.48256,0 0.82786,-1.02687 0.49351,-2.02189 1.08257,-3.21592 1.20993,-2.52336 2.75423,-3.44674 4.81591,-5.35718 1.19403,-1.10647 1.93431,-1.6557 3.2159,-2.68256 3.02487,-2.42787 4.97512,-3.50249 8.03183,-5.89054 2.34027,-1.8229 3.11243,-3.80495 5.89847,-4.82385 2.15721,-0.78806 3.59003,-0.73236 5.89054,-0.53335 2.36415,0.19903 3.50246,1.52039 5.88256,1.60795 4.56912,0.15925 6.24873,-3.82087 10.73028,-4.83182 1.24182,-0.27064 2.02986,-0.11145 3.20002,-0.52537 3.65369,-1.26566 2.8179,-6.17708 6.44771,-7.50644 2.54726,-0.93132 4.70447,1.50448 6.96517,0 2.69854,-1.79898 1.61589,-4.83977 2.14124,-8.03181 0.62092,-3.71739 0.32642,-5.89051 0.54137,-9.64773 l 0.52533,-0.54129 c -2.10147,-0.42189 -3.22387,-0.89948 -5.36515,-1.06665 -3.55025,-0.28657 -5.52438,0.96318 -9.10643,1.06665 -3.56618,0.10356 -5.62787,0.20698 -9.12235,-0.53332 -2.5791,-0.54924 -3.90844,-1.30547 -6.43979,-2.14127 -3.12037,-1.05074 -4.75222,-2.26867 -8.02385,-2.68258 -2.07761,-0.2627 -3.26367,0.0796 -5.3572,0 -2.50744,-0.0877 -3.93232,-0.19106 -6.44773,-0.53334 -4.4577,-0.6209 -6.86962,-1.5363 -11.23976,-2.68257 -4.43381,-1.15422 -6.83778,-4.40198 -11.25567,-3.2159 -2.08556,0.5572 -2.91344,1.67161 -4.81593,2.68256 -2.48355,1.31344 -3.64574,2.81788 -6.43977,3.21591 -2.08553,0.29454 -3.24773,-0.50149 -5.36514,-0.53333 -2.50745,-0.0479 -4.06765,-0.35024 -6.4318,0.53333 -3.59801,1.34526 -4.40199,4.0995 -6.96514,6.96516 -1.97412,2.21292 -2.56318,3.97212 -4.82388,5.89052 -2.197,1.88656 -3.90048,2.28455 -6.42385,3.7572 l 0,1.60794 c 0.21493,1.87859 -0.55722,3.27164 0.53333,4.82386 0.96318,1.3771 2.1413,1.67163 3.75721,2.14129 2.82587,0.81989 4.56913,-1.45671 7.49846,-1.07463 2.42786,0.31044 4.52935,0.10357 5.88257,2.14926 1.27363,1.91044 -1.74328,4.394 0,5.88255 1.27363,1.11443 2.61095,0.54924 4.29053,0.5413 2.33234,-0.007 3.99601,-2.44378 5.89052,-1.06667 2.50745,1.81492 -0.4776,5.30944 -2.68257,7.49848 -2.05371,2.05374 -4.1552,1.94231 -6.96516,2.67462 -2.65072,0.70049 -4.2348,0.76419 -6.96513,1.07463 -2.70646,0.31044 -4.24277,0.71641 -6.95721,0.54129 -1.47261,-0.10356 -2.30047,-0.32638 -3.75717,-0.54129 l -1.0826,0.54129 c -0.82784,1.24973 -1.30547,1.95821 -2.13332,3.20796 l -2.68257,2.14923 c 0.6368,1.04277 0.82787,1.72735 1.60793,2.67462 1.37714,1.62386 2.47562,2.28456 4.3383,3.21589").attr(attr);
						asia.tm = R.path("m 91.206982,530.4659 c 1.56816,2.70647 2.403958,8.42186 4.82386,6.43182 1.480576,-1.23381 0.899513,-2.91342 1.066661,-4.83182 0.262701,-3.14429 -3.184049,-5.68357 -1.066661,-8.0318 0.819895,-0.90748 1.536303,-1.17016 2.682582,-1.60796 1.759196,-0.69253 2.969156,-0.94728 4.807956,-0.5413 3.48657,0.77215 3.47858,4.37012 5.89847,6.9731 1.61593,1.71941 2.50748,2.73036 4.29055,4.28258 3.04079,2.66665 8.80395,1.84676 8.56514,5.89848 -0.11144,1.86269 -0.78807,3.00896 -2.1413,4.28259 -1.88655,1.76714 -3.87659,2.03778 -6.43183,1.60793 -2.12535,-0.35819 -2.81789,-1.94225 -4.83181,-2.68255 -2.18903,-0.79604 -3.5582,-0.89952 -5.89848,-1.06668 -1.44875,-0.10357 -2.39602,-0.58109 -3.749251,0 -2.602964,1.11443 -2.197005,4.12336 -2.141278,6.96515 0.032,1.27361 -0.04789,2.09354 0.533303,3.2159 1.09853,2.0617 3.263696,1.6398 5.349256,2.67464 1.68757,0.83581 3.33533,0.54924 4.29849,2.14923 1.21793,1.99004 -0.64475,3.598 -1.06664,5.89051 -0.41394,2.09356 -1.51245,3.27961 -1.06666,5.36517 0.46964,2.32437 1.89451,3.31144 3.73332,4.8159 1.56816,1.28955 3.15221,1.17016 4.66464,2.14923 0.23881,0.15133 0.46965,0.32639 0.70052,0.52539 1.80695,1.65572 2.14921,3.1761 3.20791,5.36514 1.91046,3.93234 2.11743,6.49551 3.22389,10.72236 0.82785,3.27161 0.5082,1.90733 1.42424,4.27089 l 1.38641,2.79632 c 1.66367,0.5424 3.08784,0.6621 4.68783,-0.10207 2.73033,-1.29751 4.16317,-2.30844 6.44772,-4.29055 2.10944,-1.84675 2.70648,-3.48653 4.80797,-5.35717 1.56814,-1.38509 2.21292,-3.30347 4.29052,-3.21592 1.81491,0.0716 1.98207,2.36418 3.76515,2.67463 1.68756,0.31044 2.8577,-0.0715 4.28258,-1.06669 1.09851,-0.76415 1.0587,-1.90247 2.14129,-2.68255 2.56316,-1.83085 5.03878,-0.39004 8.03976,0.5413 2.50745,0.77213 3.55023,2.04574 5.89053,3.20794 2.27661,1.13035 3.56615,1.72736 5.90644,2.69052 1.65571,0.66865 2.61889,0.97912 4.2985,1.60796 l 8.55718,0 c 2.09352,0.82787 3.44675,0.95522 5.36515,2.13332 1.87859,1.17016 2.71441,2.1811 4.28256,3.75721 1.56021,1.57612 1.82289,3.16019 3.74926,4.28256 2.19698,1.28953 4.21092,-0.15925 6.42383,1.07464 2.21294,1.21789 1.99801,3.78903 4.29851,4.82387 1.71141,0.77212 3.00892,0 4.82384,0.53331 1.79105,0.53335 2.79402,1.01095 4.27462,2.14924 2.26865,1.72738 2.95324,3.38307 4.29848,5.89055 1.05871,1.98206 1.33731,3.26366 2.13334,5.35717 0.88356,2.28457 1.31342,3.598 2.1572,5.89053 l 0,1.07461 c 1.67959,0.20698 2.59504,0.42189 4.29053,0.5413 2.08555,0.14323 3.34327,-0.58907 5.35719,0 2.15722,0.62886 2.55521,3.34327 4.81591,3.21591 1.67959,-0.0957 2.18107,-1.52036 3.75719,-2.14925 1.59202,-0.64477 2.9771,0.0479 4.27462,-1.06666 2.08557,-1.77511 -1.45671,-5.10247 0.54129,-6.9731 1.55225,-1.45672 3.52633,0.0398 5.35718,-1.06667 1.25771,-0.77213 1.28956,-2.16516 2.67462,-2.68257 1.18606,-0.43781 2.02189,0.398 3.2159,0 1.68758,-0.55722 2.18111,-1.77513 3.20798,-3.21591 2.06963,-2.84178 1.59199,-5.24575 2.69052,-8.5731 0.62088,-1.88656 0.27861,-3.35919 1.60797,-4.82387 1.86266,-2.05373 4.55319,-0.21491 6.96514,-1.60796 1.41691,-0.8119 1.5761,-2.57113 3.19999,-2.6746 1.40096,-0.0958 1.82285,1.45671 3.22385,1.60795 1.50449,0.16716 2.29254,-0.65273 3.74129,-1.07462 l 1.08258,0.53333 c -0.199,-2.71441 -0.0557,-4.28257 -0.52536,-6.95719 -0.31046,-1.70348 0.11936,-3.04874 -1.07464,-4.29848 -1.33731,-1.38507 -2.93731,-0.70051 -4.82386,-1.06669 -2.90545,-0.54922 -4.55322,-0.98705 -7.49847,-1.06664 -2.73034,-0.0796 -4.25869,0.77214 -6.96515,0.52536 -2.56317,-0.21491 -4.00398,-0.74029 -6.43182,-1.59997 -3.08855,-1.09851 -4.64872,-2.1652 -7.49847,-3.7572 -2.14131,-1.18609 -3.51043,-1.60798 -5.37314,-3.20798 -1.1781,-1.04277 -1.90247,-2.10943 -2.52335,-3.2159 -0.84379,-1.52038 -1.48058,-3.12039 -2.81788,-4.82386 -1.57613,-1.96615 -2.57911,-2.97709 -4.29055,-4.82385 -3.20792,-3.47065 -5.16616,-5.27759 -8.56515,-8.5731 -3.4945,-3.39898 -5.35718,-5.4766 -9.12236,-8.58107 -3.58205,-2.94526 -5.04674,-6.24872 -9.63975,-6.96514 -3.35919,-0.5174 -5.58804,3.22387 -8.58106,1.60797 -3.14426,-1.67961 -1.36914,-5.50844 -3.21592,-8.56515 -1.21789,-2.05375 -2.04574,-3.15223 -3.75721,-4.82388 -1.99798,-2.00598 -3.77309,-2.38805 -5.89051,-4.29051 -2.62684,-2.38805 -2.83381,-5.1343 -5.86664,-6.96514 -3.6378,-2.18111 -6.55916,-2.27662 -10.73031,-1.60797 -4.43381,0.70844 -6.44772,2.88158 -10.18902,5.35719 -4.57709,3.0169 -6.58306,5.49252 -10.71439,9.11439 -1.91044,1.65571 -2.31641,4.16317 -4.81588,4.28258 -2.8179,0.12729 -2.64277,-4.11543 -5.38108,-4.82387 -2.02985,-0.52537 -3.2398,0.60498 -5.34924,0.54129 -2.33232,-0.0796 -3.75719,-0.1273 -5.88257,-1.07462 -2.17311,-0.97115 -2.7144,-2.6746 -4.82386,-3.74926 -3.39899,-1.73531 -6.74225,0.85971 -9.64772,-1.60792 -1.36915,-1.17016 -1.06666,-2.93732 -2.67462,-3.75721 -1.88654,-0.94728 -3.32735,1.05075 -5.35717,0.54129 -1.6398,-0.40597 -2.17313,-1.57613 -3.76518,-2.14129 -2.36417,-0.85173 -3.90048,-0.47761 -6.423862,-0.54129 -3.773112,-0.10356 -5.890522,0.32635 -9.655674,0.54129 l -1.615928,-0.54129 c 0.29451,2.57113 0.764173,3.99601 1.615928,6.43183 0.827847,2.38805 1.424846,3.70941 2.682568,5.89847").attr(attr);
						var current = null;
						for (var state in asia) {
							asia[state].color = Raphael.getColor();
							(function (st, state) {
								st[0].style.cursor = "pointer";
								st[0].onmouseover = function () {
									current && asia[current].animate({fill: "#015C3B", stroke: "#ccc"}, 500) && (document.getElementById(current).style.display = "");
									st.animate({fill: st.color, stroke: "#ccc"}, 500);
									st.toFront();
									R.safari();
									document.getElementById(state).style.display = "block";
									current = state;
								};
								st[0].onmouseout = function () {
									st.animate({fill: "#087C8F", stroke: "#ccc"}, 500);
									st.toFront();
									R.safari();
								};
								if (state == "uz") {
									st[0].onmouseover();
								}
							})(asia[state], state);
						}
					};
			</script>
					<?php 
						if (Yii::app()->user->IsGuest) {
									echo '<div id="canvas" style="position:relative;">
						<div id="paper" style="position:absolute;bottom:-300%;"></div>
						<div id="uz">
							<h3>Узбекистан</h3>
							<p>
								&nbsp;
							</p>
						</div>
						<div id="kz">
							<h3>Казахстан</h3>
							<p>
							   KZ
							</p>						
						</div>
						<div id="tj">
							<h3>Таджикистан</h3>
							<p>
								TJ
							</p>						
						</div>
						<div id="kg">
							<h3>Кыргызстан</h3>
							<p>
								KG
							</p>						
						</div>
						<div id="tm">
							<h3>Туркменистан</h3>
							<p>
								TM
							</p>						
						</div>
					</div>';
				}
			?>
			
    </div>
    <div class="grid col-one-half mq2-col-full">
        <?php 
        if (Yii::app()->user->IsGuest)
        {
            $this->widget('application.extensions.widgets.Login', array('model' => $model, 'code' => $code));

        }
        else
        {
			echo '<div style="height:200px"></div>';
            /*
            echo CHtml::link(
                        Yii::t('site', 'logout'),
                        array('site/logout'),
                        array('class' => 'btn btn-primary')
                ); 
             */
        }
        ?>
    </div>
</section>
<section class="services grid-wrap">
    <header class="grid col-full">
        <hr>
        <p class="fleft"></p>
    </header>
    <article class="grid col-one-third mq3-col-full">
        <h5>About programme</h5>
        <p>The survey aims to get insights into the teaching methodology in higher and vocational educational institutions – partners of the Programme, and to find out ways to improve education processes at these institutions.</p>
    </article>
        
    <article class="grid col-one-third mq3-col-full">
        <h5></h5>
        <p style="text-align:center;"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/slogan.png" border="0"></p>
    </article>
		
    <article class="grid col-one-third mq3-col-full">
        <h5>Contacts</h5>
	<p>Address: Chimkentskaya St. 7a, 100029, Tashkent, Uzbekistan</p>
	<p>Phone: +998 71 140-04-90</p>
	<p>E-mail: <a href="mailto:ekaterina.golubina@giz.de">ekaterina.golubina@giz.de</a></p>
	<p>Web: www.eduinca.net</p>
    </article>
</section>
<!--main-->   
<!-- Javascript - jQuery -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.7.2.min.js"></script>
<script>
jQuery(document).ready(function($) {
	tab = $('.tabs h3 a');
	tab.on('click', function(event) {
		event.preventDefault();
		tab.removeClass('active');
		$(this).addClass('active');
		tab_content = $(this).attr('href');
		$('div[id$="tab-content"]').removeClass('active');
		$(tab_content).addClass('active');
	});
});
</script>
<!--[if (gte IE 6)&(lte IE 8)]>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/selectivizr.js"></script>
<![endif]-->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/scripts.js"></script>