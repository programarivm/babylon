<?php

namespace Babylon\Tests\Unit\Family;

use Babylon\Family\Family;
use PHPUnit\Framework\TestCase;

class RomanceTest extends TestCase
{
    /**
     * @dataProvider fraData
     * @test
     */
    public function detect_fra($text)
    {
        $this->assertEquals('romance', (new Family($text))->detect());
    }

    /**
     * @dataProvider itaData
     * @test
     */
    public function detect_ita($text)
    {
        $this->assertEquals('romance', (new Family($text))->detect());
    }

    /**
     * @dataProvider porData
     * @test
     */
    public function detect_por($text)
    {
        $this->assertEquals('romance', (new Family($text))->detect());
    }

    /**
     * @dataProvider ronData
     * @test
     */
    public function detect_ron($text)
    {
        $this->assertEquals('romance', (new Family($text))->detect());
    }

    /**
     * @dataProvider spaData
     * @test
     */
    public function detect_spa($text)
    {
        $this->assertEquals('romance', (new Family($text))->detect());
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
}
