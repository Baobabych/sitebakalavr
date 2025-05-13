<?php
session_start();
require_once 'database/db_connect.php';
require_once "lib/lib.php";
//Массив композиторів вказаної епохи
$composers = getComposerByEpoh($conn,'romanticism');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusaFind - Епоха романтизму</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/epochs.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Carattere:400|Alegreya+SC:400,400i,500,500i,700,700i,800,800i,900,900i|Pattaya:400">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Carattere:400|Alegreya+SC:400,400i,500,500i,700,700i,800,800i,900,900i|Pattaya:400">
    <link
    rel="stylesheet"
    href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="../res/fontawesome/css/all.css" />
    <link rel="stylesheet" href="css\player.css">
</head>
<body>
    <header>
        <div>
            <img src="img/key.png" alt="">
            <a class="logotxt" href="index.php">Musa Find</a>
        </div>
        <nav>
            <?php include "partials/menu_item.php";?>
        </nav>
    </header>
    <main>
        <div class="title">
            <h1>Романтизм</h1>
            <h3>Підліток - час емоційної виразності, свободи творчості та багатства мелодій.</h3>
            <div>
                <a href="#history">ІСТОРІЯ →</a>
                <a href="#genre">ЖАНРИ →</a>
                <a href="#comp">КОМПОЗИТОРИ →</a>
            </div>
        </div>
        <div class="history" id="history">
            <div class="historyContent">
                <h2>Історія Романтизму</h2>
                <p>Художня течія, що сформувалася наприкінці XVIII — на початку XIX ст. спочатку в літературі, потім у музиці та інших мистецтвах. Поняття «романтизм» походить від епітету «романтичний».

                    До XVIII ст. він вказував на деякі особливості літературних творів, написаних романськими мовами. Це були романси, поеми та романи про лицарів. Наприкінці XVIII ст. «романтичне» розуміється ширше: як як авантюрне, цікаве, а й як старовинне, самобутньо народне, далеке, наївне, фантастичне, духовно піднесене, примарне, і навіть дивне, лякаюче.</p>
                <p>Це відбувалося тому, що професійна музика в Європі тривалий час була прерогативою церкви, і мала
                    знаходитися в рамках
                    канонів і традиції, подолати які було дуже складно.</p>
                <p>Музичний романтизм, що відчутно проявив себе у другому десятилітті XIX ст., був явищем історично новим і водночас виявляв глибокі наступні зв'язки з музичною класикою. Безпосередніми попередниками романтизму були Людвіг Ван Бетховен та Луїджі Керубіні; Найбільш віддаленим своїм попередником багато романтиків (наприклад, Шуберт, Вагнер, Берліоз) вважали К.В. Глюка. Ідеї, структура творів, які встановилися або тільки намітилися в їх деяких творах, були розвинені при романтизмі.</p>
                <p>Твори, які стосуються романтизму, сприймаються як палкі і емоційно виразні. Композитори-романтики намагалися за допомогою музичних засобів висловити глибину та багатство внутрішнього світу людини. Музика стає більш рельєфною, індивідуальною. Набувають розвитку пісенні жанри, у тому числі баладу.</p>
            
            </div>   
            <div class="images">
                <img class="hisimg" src="img\roman_media\roman_group.png" alt="">
                <img class="hisimg" src="img\roman_media\roman_group2.png" alt="">
            </div>
            </div>
            <div class="instruments">
                <h2>Інструменти</h2>
                <p>Щоб послухати як звучать інструменти клікніть по зображенням</p></div>
                <div class="instrimg1">
                <a href="https://youtu.be/Hf6yDgca82k" target="_blank"><img class="instrimg" style="width: 350px; height: 250px;" src="img\classic_media\fortepiano.jpg" alt="fortepiano"></a>
                <a href="https://youtu.be/xe4CGplmdW0" target="_blank"> <img class="instrimg" src="img\classic_media\trombone.jpg" alt="trombon"></a>
                <a href="https://www.youtube.com/watch?v=2DaRhiCKGMk" target="_blank"><img class="instrimg" style="height: 150px;" src="img/instruments/viola.png" alt="skripka"></a>
            </div>
        
                <div class="instruments">
                <p class="text"> Ось деякі з популярних інструментів, які визначили цей період: <br>
        
                    Фортепіано: Цей інструмент став одним з найважливіших у класичному музичному ансамблі. Відомий також як "фортепіано форте" (soft-loud), він зміг виражати широкий динамічний діапазон, що було важливою новацією для того часу.<br>
                    
                    Скрипка: Струнні інструменти, зокрема скрипка, грали ключову роль у класичних оркестрах. Творці того часу, такі як Вольфганг Амадей Моцарт і Людвіг ван Бетховен, написали безліч концертів та симфоній, в яких скрипка брала активну участь.<br>
                    
                    Віолончель: Інший важливий струнний інструмент, віолончель, також входив до складу класичних оркестрів та камерних ансамблів. Відомі композитори створили велику кількість творів для цього інструменту.<br>
                    
                    Флейта: Дерев'яний духовий інструмент, такий як флейта, був часто використовуваний у класичних симфоніях і концертах.<br>
                    
                    Кларнет: Цей духовий інструмент став популярним у другій половині XVIII століття і з'явився як новий елемент у складі класичних оркестрів.<br>
                    
                    Фагот: Ще один духовий інструмент, фагот, зазвичай грав у нижній реєстрі, додаючи глибину та збагачуючи звучання оркестру.<br>
                    
                    Тромбон: В деяких оркестрах і композиціях використовувався тромбон, який надавав потужний звук та можливості для динамічних акцентів.<br>
                    
                    Ці інструменти взаємодіяли у складі оркестру та камерних гуртків, утворюючи характерний звук класичної музики епохи Класицизму. Їхні можливості були вдало використані в творах таких визначних композиторів, як Моцарт, Бетховен, Гайдн та інші. </p>   
             </div>
        
                <div class="instrimg1">
                    <a href="https://www.youtube.com/watch?v=uT3SBzmDxGk" target="_blank"><img class="instrimg" src="img/instruments/barochna_skripka.png" alt="violonchel"></a>
                    <a href="https://youtu.be/klN4H7-zJSc" target="_blank"><img style="height: 250px;" class="instrimg" src="img\classic_media\klarnet.jpg" alt="klarnet"></a>
                        <a href="https://www.youtube.com/watch?v=9eONG-gOYXw" target="_blank"> <img class="instrimg" style="margin-left: 10px;" src="img/instruments/goboy.png" alt="Flute"></a>
                            <a href="https://www.youtube.com/watch?v=pX9A5bib1FQ" target="_blank"><img class="instrimg" style="width: 250px; height: 300px; margin-left: 10px;" src="img/instruments/fagot.jpg" alt="fagot"></a>
                        </div>
        
                        <div class="sep"></div>
        
            <div class="genre" id = "genre">
                <h2>Жанри Романтизму</h2>
                <p class="text">Музична культура класицизму творить нові жанри інструментальної музики – соната, симфонія, концерт. Сформувалася багаточастинна сонатно-симфонічна форма, яка досі є основою багатьох інструментальних творів. <br> 
        
                    У період класицизму склалися основні типи камерних ансамблів – тріо, струнний квартет. <br></p>
                    
              <h2>Сонатна форма:<br></h2>
        
                     <p class="text"> Жанр сонати існував ще на початку XVII століття, проте сонатна форма остаточно сформувалася лише у творчості Гайдна та Моцарта, а Бетховен довів її до досконалості і навіть почав ламати суворі канони жанру. <br>
                        Сонатна форма включає 3 головні розділи:<br>
                        
                        експозиція (проведення основних тем)<br>
                        
                        розробка (розвиток та зіставлення тем)<br>
                        
                        репризу (видозмінене повторення експозиції, у якому зазвичай відбувається тональне зближення раніше протиставляються одна одній тем).<br>
                        
                          Як правило, у сонатній формі були написані перші (швидкі) частини сонатного чи симфонічного циклу, тому за ними закріпилася назва сонатного allegro. <br>
                        Найвідоміша соната, яку ви чули 100% - Це місячна соната Бетховена. Особливо, якщр ви грали в гру Resident Evil</p>
        <br>
        <br>
            
        <audio id="player" src="img\music\Бетховен соната14 до дієз мінор Місячна 1ч.mp3"></audio>
        <div class="player">
          <div class="control">
            <i class="fas fa-play" id="playbtn"></i>
          </div>
          <div class="info">
            Соната до-дієз мінор Місячна - Бетховен
            <div class="bar" id="progress-bar">
              <div id="progress"></div>
            </div>
          </div>
    
          <div id="current">0:00</div>
        </div>
    
        <script src="js/player.js"></script>
            
        
            <p class="text">В мультфільмі "Рік і Морті" також використовується ця композиція в серії "Something Ricked This Way Comes"</p>
        
        
        <h2>Симфонія:<br></h2>
        
               <p class="text">Великий внесок у початковий розвиток жанру зробили композитори мангеймської школи. Починаючи з 1740 року, придворна капела Мангейма стає музичним центром розвитку нових оркестрових форм. Збільшення кількості інструментів в оркестрі нової формації унеможливило управління музичним колективом «від клавесина», і фігура диригента стає головною.
        
                Класична симфонія майже завжди складається із 4-х частин:
              
              І частина. Швидка активна частина у традиційній для неї формі сонатного allegro;
              
              ІІ частина. Повільна частина (форма її, як правило, суворо не регламентована - тут можливі і варіації, і тричастинна складна або проста форма, і рондо-сонати, і повільна сонатна форма);
              
              ІІІ частина. Менует (іноді скерцо), так звана жанрова частина – формою майже завжди складна тричасткова;
              
              IV частина. Фінальна швидка частина, для якої також нерідко обирали сонатну форму, іноді форму рондо або рондо-сонати.
            
            Найпопулярнішим твором твердо можна вважати Симфонію 5 Бетховена. Прослухайте і ми впевненні, що ви точно подумаєте" Хм.....десь я це точно чув"</p>
        
        <div class="video">
            <iframe width="853" height="480" src="https://www.youtube.com/embed/iyuUl4m-Esc" title="Бетховен. Симфония №5" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        
        <h2>Сюїта:<br></h2>
        
               <p class="text">Назва концерту, як жанру, походить від латинського слова concertare - "змагання". Це твір для оркестру та солюючого інструменту. Інструментальний концерт, створений в епоху Відродження і який отримав просто грандіозний розвиток у музичній культурі бароко, у творчості віденських класиків набув сонатно-симфонічної форми. <br>
        
         
        
                До кінця епохи класицизму сформувалася класична структура концерту: <br>
                
                ​
                
                І частина. Алегро в сонатній формі. <br>
                
                ІІ частина. Повільна, частіше у формі арії, у 3-х частинах.<br>
                
                ІІІ частина. Швидка у формі рондо, рондо-соната або теми з варіаціями.<br>
                
                ​
                
                Заклали цю структуру Йозеф Гайдн та Вольфганг Амадей Моцарт, а надалі вона утвердилася у творчості Людвіга ван Бетховена.</p>
        
        <div class="video">
            <iframe width="853" height="480" src="https://www.youtube.com/embed/NjF2U4POw0A" title="Денис Мацуєв. Концерт №1 Людвіга ван Бетховена. Matsuev. Beethoven. Piano concerto No.1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <br>
            </div>
        
        <div class="sep"></div>
        
            <div class="comp" id="comp">
                <h2>Композитори</h2>
                <?php if(!empty($composers)): ?>
                    <?php foreach ($composers as $composer): ?>
                        <div class="compContent">
                            <img src="<?php echo $composer['photo']; ?>" alt="">
                            <div>
                                <b><?php echo $composer['name']; ?></b>
                                <p class="text">
                                    <a class="link" style="color: blue" href="composer.php?id=<?php echo $composer['id']; ?>">Читати</a>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </main>
        <footer>
             <?php include "partials/footer_item.php";?>
        </footer>
        </body>
        <script src="js/extText.js"></script>
        </html>