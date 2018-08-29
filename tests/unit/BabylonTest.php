<?php

namespace Babylon\Tests;

use Babylon\Babylon;
use PHPUnit\Framework\TestCase;

class BabylonTest extends TestCase
{
    /**
     * @dataProvider engData
     * @test
     */
    public function detect_eng($phrase)
    {
        $this->assertEquals('eng', (new Babylon)->detect($phrase));
    }

    /**
     * @dataProvider fraData
     * @test
     */
    public function detect_fra($phrase)
    {
        $this->assertEquals('fra', (new Babylon)->detect($phrase));
    }

    public function engData()
    {
        return [
            ["Mary thought she might not be permitted to do that at night"],
            ["Even if you're really going through hard times a good friend can improve your spirits"],
            ["He has the most international caps but there are better players in the squad"],
            ["Impossible things happen that we can't understand. They're completely unimaginable"],
            ["I tried Buddhist meditation once but I fell asleep halfway through the session"]
        ];
    }

    public function fraData()
    {
        return [
            ["Tu ferais mieux de consulter un dictionnaire quand tu ne connais pas le sens d'un mot"],
            ["Je veux simplement que vous sachiez tous que vous pouvez compter sur moi"],
            ["Une fête de bienvenue a été organisée en l'honneur de monsieur Jones"],
            ["Tu veux savoir pourquoi je fais la tête ? Parce que tu n'es jamais là"],
            ["La nouvelle édition des programmes télévisés est dépassée comme d'habitude"]
        ];
    }
}
