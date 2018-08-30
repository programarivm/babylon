<?php

namespace Babylon\Tests;

use Babylon\Babylon;
use Babylon\Filter;
use PHPUnit\Framework\TestCase;

class BabylonTest extends TestCase
{
    /**
     * @dataProvider danData
     * @test
     */
    public function detect_dan($phrase)
    {
        $this->assertEquals('dan', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    /**
     * @dataProvider deuData
     * @test
     */
    public function detect_deu($phrase)
    {
        $this->assertEquals('deu', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    /**
     * @dataProvider engData
     * @test
     */
    public function detect_eng($phrase)
    {
        $this->assertEquals('eng', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    /**
     * @dataProvider finData
     * @test
     */
    public function detect_fin($phrase)
    {
        $this->assertEquals('fin', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    /**
     * @dataProvider fraData
     * @test
     */
    public function detect_fra($phrase)
    {
        $this->assertEquals('fra', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    /**
     * @dataProvider hunData
     * @test
     */
    public function detect_hun($phrase)
    {
        $this->assertEquals('hun', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    /**
     * @dataProvider islData
     * @test
     */
    public function detect_isl($phrase)
    {
        $this->assertEquals('isl', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    /**
     * @dataProvider itaData
     * @test
     */
    public function detect_ita($phrase)
    {
        $this->assertEquals('ita', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    /**
     * @dataProvider nldData
     * @test
     */
    public function detect_nld($phrase)
    {
        $this->assertEquals('nld', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    /**
     * @dataProvider porData
     * @test
     */
    public function detect_por($phrase)
    {
        $this->assertEquals('por', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    /**
     * @dataProvider ronData
     * @test
     */
    public function detect_ron($phrase)
    {
        $this->assertEquals('ron', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    /**
     * @dataProvider spaData
     * @test
     */
    public function detect_spa($phrase)
    {
        $this->assertEquals('spa', (new Babylon)->detect(Filter::phrase(Filter::phrase($phrase))));
    }

    /**
     * @dataProvider sweData
     * @test
     */
    public function detect_swe($phrase)
    {
        $this->assertEquals('swe', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    public function danData()
    {
        return [
            [
                "Du beskyldte ham for at have stjålet cyklen. Drengen har mistet sit øre i en gadekamp."
            ],
            [
                "Alle drengene løb væk. Væk! Vi har ikke brug for mennesker af din slags."
            ],
            [
                "Jeg har brug for en nedstryger for at kunne færdiggøre dette arbejde. Dine brødre er særdeles gode i skolen."
            ],
            [
                "I mit ur er fjederen gået i stykker. Vær så venlig at vise mig vejen til stationen."
            ],
            [
                "På grund af mine korte ben er jeg nødt til at lægge alle de benklæder jeg køber op. Græd ikke. Gråd løser ikke noget."
            ],
        ];
    }

    public function deuData()
    {
        return [
            [
                "Ich werde es später gründlich nachschlagen und dir mailen. Ein gutes Sonderangebot hat gewöhnlich einen guten Profit für den Verkäufer zur Folge."
            ],
            [
                "Sie nahm es mit der Wahrheit nicht so genau. Wenn es um Ernährung und Gesundheit geht gibt es keine Kompromisse."
            ],
            [
                "Tom ist ein Romantiker der zu seinem Vergnügen Käse so herstellt wie es die Großmutter tat. Sie kümmerte sich gern um die Kinder."
            ],
            [
                "Er ist ein Mann den man nicht unterschätzen sollte. Es braucht mindestens ein ganzes Dorf damit ein Kind groß wird."
            ],
            [
                "Gott ist Geist und die ihn anbeten die müssen ihn im Geist und in der Wahrheit anbeten. Warum häufst du in deiner Wohnung jedweden Abfall an?"
            ],
        ];
    }

    public function engData()
    {
        return [
            [
                "Mary thought she might not be permitted to do that at night. Even if you're going through hard times."
            ],
            [
                "He has the most international caps but there are better players in the squad. Impossible things happen."
            ],
            [
                "Have you seen Tom this morning? I tried Buddhist meditation but I fell asleep through the session."
            ],
            [
                "Sami was born and raised on the quiet streets of a small town. I already told them that."
            ],
            [
                "Close the window before you leave. Before we wrap up we'll take some questions from the audience."
            ],
        ];
    }

    public function finData()
    {
        return [
            [
                "Hyvän opettajan täytyy olla kärsivällinen oppilaidensa kanssa. Minulla on tylsää. Tehdään jotain hauskaa."
            ],
            [
                "Perinpohjainen tietokonejärjestelmien ja ohjelmointikielten tuntemus on olennainen osa Tomin työtä. Älähän nyt itke. Minuakin alkaa itkettää kun näen sinun itkevän."
            ],
            [
                "Kaiken maailman sörsseleitä täällä yritetäänkin ihmiselle syöttää! Tämä on aivan kauheaa mössöä. Minun pitää kysyä sinulta monta kysymystä."
            ],
            [
                "Turvallisuussyistä varmista että luet ohjekirjan ennen tämän tuotteen käyttämistä. Jos kyseessä on oikea kanadalainen niin hän ei varmasti sanoisi mitään tuollaista."
            ],
            [
                "Tässä on sinulle aakkosellinen luettelo kaikista niistä suomen kielen sanoista jotka eivät esiinny. Olen nälkäinen sillä en ole syönyt lounasta."
            ],
        ];
    }

    public function fraData()
    {
        return [
            [
                "Que vous sachiez tous que vous pouvez compter sur moi. Une fête de bienvenue a été organisée."
            ],
            [
                "J'avais oublié à quel point il pouvait être insupportable. Je penserai chaque jour à vous pendant que je serai au loin."
            ],
            [
                "Je suis allé à Boston en voyage d'affaires pendant cinq jours. C'est ce que tu crains le plus n'est-ce pas?"
            ],
            [
                "Ce qui m'a le plus surpris c'est que j'étais le seul à me faire virer. Une compresse glacée soulage mon mal de tête."
            ],
            [
                "Je te raconterai ce que j'ai fait aujourd'hui. J'ai écrit mon nom sur la feuille."
            ],
        ];
    }

    public function hunData()
    {
        return [
            [
                "Ez egy praktikus lexikon hogy utánanézzünk bizonyos dolgoknak. Úgy látszik most mindenki a tengerpartra szeretne utazni fürödni feküdni és napozni a strandon."
            ],
            [
                "Most tényleg nincs időm ilyen hosszadalmas eszmefuttatáshoz és különben sincs semmi kedvem hozzá. A szavak mint kulcsok ajtókat képesek kinyitni vagy bezárni."
            ],
            [
                "Egy olyan világban élünk ahol a rámenős emberek és az erőszakos népek jobban érvényesülnek. A Seuso-kincseket megtaláló kiskatona felaksztotta magát egy ajtókilincsre."
            ],
            [
                "Csak egy menekült vagyok aki az angol nyelvet próbálja megvédeni azoktól kiknek az az anyanyelve. Tomnak soha nem kellett volna otthagynia az állását."
            ],
            [
                "Tamás és Mária magukat liberális szülőknek tartják így a gyerekeikre bízzák a döntést. Vége lett a forró nyári napoknak és a helyükbe hűvös őszi napok léptek."
            ],
        ];
    }

    public function islData()
    {
        return [
            [
                "Tókíó sem er stærsta borgin í Japan er vakandi allan sólarhringinn. Á þriðjudaginn var virkilega kalt. Það er undir stólnum."
            ],
            [
                "Hún safnaði hundrað dollurum. Tom var ekki með. Takk fyrir að hafa komið. Farðu á markaðinn! Helvítis hvað ertu að gera? Þau giftast í næsta mánuði."
            ],
            [
                "Allt sem þú sagðir í tölvupóstinum er rétt að verðinu undanskildu. Þar sem hún er skrifuð á einfaldri ensku er bókin auðlesin. Bíllinn minn fer ekki í gang."
            ],
        ];
    }

    public function itaData()
    {
        return [
            [
                "Lei ha decorato il suo quaderno con involucri di gomma in modo che la copertina fosse tutta lucida. È impossibile dimostrare che è possibile."
            ],
            [
                "La mia macchina fotografica è diversa dalla vostra. Lui cercò di trovare una motivazione per le sue azioni insensate."
            ],
            [
                "Non bisogna mai dare la prevalenza ad un testo piuttosto che ad un altro. Chaucer e Boccaccio sono due scrittori. Il primo è inglese  il secondo è italiano."
            ],
            [
                "Tom proverà a convincere Mary ad accettare la vostra offerta. Lo spettacolo era così noioso che io e Ann ci siamo addormentati."
            ],
            [
                "Di certo non sarebbe male rendere più stretti e severi i controlli non ti pare? La Commissione chiede allo Stato italiano di fornire alcuni chiarimenti su una legge."
            ],
        ];
    }

    public function nldData()
    {
        return [
            [
                "Iedere man met een haarstukje heeft angst voor winderige dagen. Ik zou graag weten hoe je aan mijn telefoonnummer geraakt bent."
            ],
            [
                "Met de ogen zien we kijken we observeren we en lezen we. Gisteren zijn mijn vrouw en ik naar het theater geweest."
            ],
            [
                "Een persoon kan een ander persoon nooit helemaal begrijpen. De politie zal straks aankomen op de plaats van de misdaad."
            ],
            [
                "Niets houdt een man zo kwiek als een jonge echtgenote en oude vijanden. Wie een hond wil slaan vindt altijd een stok."
            ],
            [
                "Ik had het gevoel dat ik moest huilen toen ik het nieuws hoorde. Het valt te betwijfelen of deze methode zal werken."
            ],
        ];
    }

    public function porData()
    {
        return [
            [
                "Passamos o dia todo tentando provar quem estava certo. É um músico experiente escreveu mais de quinhentas canções."
            ],
            [
                "A música é a língua universal da humanidade — a poesia seu passatempo e prazer universais. Tom foi pego colando na prova e expulso da escola."
            ],
            [
                "Um otimista é alguém que sabe precisamente o quanto o mundo pode ser triste enquanto. Eu só estou fazendo isso pelo seu próprio bem."
            ],
            [
                "Eu adoraria ir com vocês mas não tenho dinheiro algum. Acho que os ovos que acabo de comer estavam podres."
            ],
            [
                "Se você me ensinar como dançar eu te mostrarei minhas cicatrizes escondidas. João nunca mais teve um cachorro depois de ser mordido pelo que cuidava."
            ],
        ];
    }

    public function ronData()
    {
        return [
            [
                "Casa era înconjurată de lanuri. Ne-am petrecut timpul într-o cafenea. Ăsta e perfect. Mătuşa lui are grijă de câinele lui în timpul zilei. Ești trist? Făceţi-vă temele acum."
            ],
            [
                "Mătuşa lui are grijă de câinele lui în timpul zilei. Ești trist? Ăsta e perfect. Făceţi-vă temele acum."
            ],
            [
                "Fiecare persoană contează. Eşti bine? Nu pot vedea nimic. Fumătorii vor dezvolta mult mai probabil cancer la plămâni decât nefumătorii."
            ],
            [
                "El profită cât mai mult de ocaziile ivite. Noi întrebăm profesorul în fiecare zi. Probabil că ea este nevinovată."
            ],
            [
                "Pentru ora următoare vreau de la voi să transcrieți versurile oricărui cântăreț atât timp cât este în limba engleză."
            ],
        ];
    }

    public function spaData()
    {
        return [
            [
                "En el supermercado de la esquina se vende la fruta a un precio muy bueno. La decisión será incluso más difícil cuanto más la demores."
            ],
            [
                "De vez en cuando él va a la biblioteca para obtener nueva información sobre libros. Si va usted en avión no podrá llevar mucho equipaje."
            ],
            [
                "Él tenía curiosidad de que sabor tendría así que le dio una pequeña mordida. Nada indica que se hará algo al respecto."
            ],
            [
                "Según Heródoto el faraón quería conocer el idioma original de la humanidad. Lo primero que tienes que hacer en un examen es escribir tu nombre."
            ],
            [
                "La suave luz de la tarde otoñal acaricia tiernamente mi rostro. Yo conozco a una chica francesa que habla muy bien el japonés."
            ],
        ];
    }

    public function sweData()
    {
        return [
            [
                "De gjorde det hett för henne. En kvinna vars man har dött är en änka. Du dricker för mycket kaffe. Hur kunde Tom veta det?"
            ],
            [
                "Det är min cd-skiva. Vi kommer aldrig att ge upp kampen om lika rättigheter. Jag tror inte att det kommer att regna i eftermiddag."
            ],
            [
                "Hur lång ledighet kommer du att ha i jul? Mary kom inte hem igår kväll. Var god fyll i enkäten och skicka in den till oss."
            ],
            [
                "Denna punkt förtjänar särskild emfas. Han gjorde det i avsaknad av bättre vetande. Denna grusväg ska inom kort asfalteras."
            ],
            [
                "Markku bestämde att han inte skulle stå till tjänst nästa gång och inte någon annan gång heller. Te är en populär dryck över hela världen."
            ],
        ];
    }
}
