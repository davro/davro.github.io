<?php

#namespace Applications\Economics;
#
#use Fabrication\Fabrication;
#use Fabrication\Authentication;
#use Fabrication\FAM\Table;
#use Fabrication\Application\View;
#use Applications\Application\Model\Article;
#use Applications\Workspace\Workspace;

/**
 * Economic Controller
 *
 * Move to core applications
 *
 *
 * https://scan.v2b.testnet.pulsechain.com/api?module=stats&action=coinprice
 * https://scan.v2b.testnet.pulsechain.com/api?module=stats&action=coinsupply
 * https://scan.v2b.testnet.pulsechain.com/api?module=account&action=txlist&address=0x582795DDEa12e7E17F58347775bC5A64948417D1
 *
 * https://www.php.net/manual/en/class.domnode.php
 *
 * https://www.armstrongeconomics.com/models/scalar-date-system/
 * https://www.armstrongeconomics.com/writings/2012-2/anatomy-of-a-debt-crisis/
 *
 *
 */
//class Economics extends Workspace
class Economics
{
    public function __construct()
    {
    }

    /**
     * Main index of the web application.
     *
     */
    public function executeIndex()
    {
//      $this->contentHeaderTagline = "Economic Confidence / Prophecies";

        ////////////////////////////////////////////////////////////////////////
        //
        // Economic Confidence Model
        //
        ////////////////////////////////////////////////////////////////////////
        // Wave 2020
        $data['2020.01.18/19'] = ['text' => 'Economic Confidence Model | Start 8.6 Year Wave 1', 'range'=> [2020]];
        $data['2022.03.14/15'] = ['text' => 'Economic Confidence Model | Bull Wave 1 End 1 ', 'range'=> [2020]];
        $data['2023.04.10/11'] = ['text' => 'Economic Confidence Model | Bear Correction 1 ', 'range'=> [2020]];
        $data['2024.05.07/08'] = ['text' => '<strong>Economic Confidence Model</strong> | Bull Wave 2 End (Peak) 1', 'range'=> [2024]];
        $data['2025.06.04']    = ['text' => 'Economic Confidence Model | Bear Rally', 'range'=> [2024]];
        $data['2026.07.02/03'] = ['text' => 'Economic Confidence Model | Bear Rally End', 'range'=> [2024]];
        $data['2028.08.25/26'] = ['text' => '<strong>Economic Confidence Model</strong> | End 8.6 Year Wave', 'range'=> [2024]];

        // Wave 2028
        $data['2028.09'] = ['text' => 'Economic Confidence Model | Start 8.6 Year Wave (28/37)', 'range'=> [2024]];
        $data['2037.03'] = ['text' => 'Economic Confidence Model | End 8.6 Year Wave (28/37)', 'range'=> [2037]];

        // Wave 2037
        $data['2037.04'] = ['text' => 'Economic Confidence Model | Start 8.6 Year Wave (37/45) ', 'range'=> [2037]];
        $data['2045.03'] = ['text' => 'Economic Confidence Model | End 8.6 Year Wave (37/45) ', 'range'=> [2042]];

        // Wave 2045 (testing)
        $data['2045.0'] = ['text' => 'Economic Confidence Model | Start 8.6 Year Wave (45/54) ', 'range'=> [2042]];
        $data['2054.0'] = ['text' => 'Economic Confidence Model | End 8.6 Year Wave (45/54) ', 'range'=> [2054]];

        // Wave 2054 (testing)
        $data['2054.3'] = ['text' => 'Economic Confidence Model | Start 8.6 Year Wave (54/63) ', 'range'=> [2054]];
        $data['2063.0'] = ['text' => 'Economic Confidence Model | End 8.6 Year Wave (54/63) ', 'range'=> [2063]];

        // Wave 2063 (testing)
        $data['2063.3'] = ['text' => 'Economic Confidence Model | Start 8.6 Year Wave (63/72) ', 'range'=> [263]];
        $data['2072.0'] = ['text' => 'Economic Confidence Model | End 8.6 Year Wave (63/72) ', 'range'=> [2072]];

        ////////////////////////////////////////////////////////////////////////
        //
        // Period When to Make Money
        //
        ////////////////////////////////////////////////////////////////////////
        //
        // C = Years of Hard Times, Low Prices, and a good time to buy Stocks, "Corner Lots", Goods, and hold till the "Boom" reaches the years of good times then unload
        // 7, 11, 9 ...
        //
        $data['1924.01.01-pwtmm-c'] = ['text' => 'Periods When to Make Money (Hard Times)', 'range'=> [1920]];
        $data['1931.01.01-pwtmm-c'] = ['text' => 'Periods When to Make Money (Hard Times)', 'range'=> [1930]];
        $data['1942.01.01-pwtmm-c'] = ['text' => 'Periods When to Make Money (Hard Times)', 'range'=> [1938]];
        $data['1951.01.01-pwtmm-c'] = ['text' => 'Periods When to Make Money (Hard Times)'];
        $data['1958.01.01-pwtmm-c'] = ['text' => 'Periods When to Make Money (Hard Times)', 'range'=> [1956]];
        $data['1969.01.01-pwtmm-c'] = ['text' => 'Periods When to Make Money (Hard Times)', 'range'=> [1968]];
        $data['1978.01.01-pwtmm-c'] = ['text' => 'Periods When to Make Money (Hard Times)', 'range'=> [1977]];
        $data['1985.01.01-pwtmm-c'] = ['text' => 'Periods When to Make Money (Hard Times)', 'range'=> [1981]];
        $data['1996.01.01-pwtmm-c'] = ['text' => 'Periods When to Make Money (Hard Times)', 'range'=> [1994]];
        $data['2005.01.01-pwtmm-c'] = ['text' => 'Periods When to Make Money (Hard Times)', 'range'=> [2003]];
        $data['2012.01.01-pwtmm-c'] = ['text' => 'Periods When to Make Money (Hard Times)', 'range'=> [2011]];
        $data['2023.01.01-pwtmm-c'] = ['text' => 'Periods When to Make Money (Hard Times)', 'range'=> [2024]];
        $data['2032.01.01-pwtmm-c'] = ['text' => 'Periods When to Make Money (Hard Times)', 'range'=> [2029]];
//        $data['2039.01.01-pwtmm'] = ['text' => 'Periods When to Make Money (Hard Times)', 'range'=> [2037]];
        $data['2050.01.01-pwtmm-c'] = ['text' => 'Periods When to Make Money (Hard Times)'];
        $data['2059.01.01-pwtmm-c'] = ['text' => 'Periods When to Make Money (Hard Times)'];
        $data['2066.01.01-pwtmm-c'] = ['text' => 'Periods When to Make Money (Hard Times)', 'range'=> [2063]];

        //
        // B = "Years" of Good Times, High Prices and the time to sell Stocks and values of all kinds.
        // 8, 9, 10 ...
        //
        $data['1926.01.01-pwtmm-b'] = ['text' => 'Periods When to Make Money (Good Times)', 'range'=> [1920]];
        $data['1935.01.01-pwtmm-b'] = ['text' => 'Periods When to Make Money (Good Times)', 'range'=> [1934]];
        $data['1945.01.01-pwtmm-b'] = ['text' => 'Periods When to Make Money (Good Times)', 'range'=> [1943]];
        $data['1953.01.01-pwtmm-b'] = ['text' => 'Periods When to Make Money (Good Times)', 'range'=> [1951]];
        $data['1962.01.01-pwtmm-b'] = ['text' => 'Periods When to Make Money (Good Times)', 'range'=> [1960]];
        $data['1972.01.01-pwtmm-b'] = ['text' => 'Periods When to Make Money (Good Times)', 'range'=> [1968]];
        $data['1980.01.01-pwtmm-b'] = ['text' => 'Periods When to Make Money (Good Times)', 'range'=> [1977]];
        $data['1989.01.01-pwtmm-b'] = ['text' => 'Periods When to Make Money (Good Times)', 'range'=> [1986]];
        $data['1999.01.01-pwtmm-b'] = ['text' => 'Periods When to Make Money (Good Times)', 'range'=> [1994]];
        $data['2007.01.01-pwtmm-b'] = ['text' => 'Periods When to Make Money (Good Times)'];
        $data['2016.01.01-pwtmm-b'] = ['text' => 'Periods When to Make Money (Good Times)'];
        $data['2026.01.01-pwtmm-b'] = ['text' => 'Periods When to Make Money (Good Times)', 'range'=> [2024]];
        $data['2034.01.01-pwtmm-b'] = ['text' => 'Periods When to Make Money (Good Times)', 'range'=> [2033]];
        $data['2043.01.01-pwtmm-b'] = ['text' => 'Periods When to Make Money (Good Times)', 'range'=> [2042]];
        $data['2053.01.01-pwtmm-b'] = ['text' => 'Periods When to Make Money (Good Times)', 'range'=> [2050]];

        //
        // A = "Years" in which panics have occurred and will occur again.
        // 18, 20, 16
        //
        $data['1927.01.01-pwtmm-a'] = ['data' => 'pwtmm-a', 'text' => 'Periods When to Make Money (Panic Times)', 'range'=> [1920]];
        $data['1945.01.01-pwtmm-a'] = ['data' => 'pwtmm-a', 'text' => 'Periods When to Make Money (Panic Times)', 'range'=> [1943]];
        $data['1965.01.01-pwtmm-a'] = ['data' => 'pwtmm-a', 'text' => 'Periods When to Make Money (Panic Times)', 'range'=> [1964]];
        $data['1981.01.01-pwtmm-a'] = ['data' => 'pwtmm-a', 'text' => 'Periods When to Make Money (Panic Times)'];
        $data['1999.01.01-pwtmm-a'] = ['data' => 'pwtmm-a', 'text' => 'Periods When to Make Money (Panic Times Dotcom Bubble)', 'search' => 'Dotcom Bubble'];
        $data['2019.01.01-pwtmm-a'] = ['data' => 'pwtmm-a', 'text' => 'Periods When to Make Money (Panic Times Covid 19)', 'search' => 'covid 19', 'range'=> [2016]];
        $data['2035.01.01-pwtmm-a'] = ['data' => 'pwtmm-a', 'text' => 'Periods When to Make Money (Panic Times)', 'range'=> [2033]];
        $data['2053.01.01-pwtmm-a'] = ['data' => 'pwtmm-a', 'text' => 'Periods When to Make Money (Panic Times)', 'range'=> [2050]];
        $data['2073.01.01-pwtmm-a'] = ['data' => 'pwtmm-a', 'text' => 'Periods When to Make Money (Panic Times)', 'range'=> [2072]];
        $data['2089.01.01-pwtmm-a'] = ['data' => 'pwtmm-a', 'text' => 'Periods When to Make Money (Panic Times)'];
        $data['2107.01.01-pwtmm-a'] = ['data' => 'pwtmm-a', 'text' => 'Periods When to Make Money (Panic Times)', 'range'=> [2106]];
        $data['2127.01.01-pwtmm-a'] = ['data' => 'pwtmm-a', 'text' => 'Periods When to Make Money (Panic Times)', 'range'=> [2123]];
        $data['2143.01.01-pwtmm-a'] = ['data' => 'pwtmm-a', 'text' => 'Periods When to Make Money (Panic Times)', 'range'=> [2140]];
        $data['2161.01.01-pwtmm-a'] = ['data' => 'pwtmm-a', 'text' => 'Periods When to Make Money (Panic Times)', 'range'=> [2158]];
        $data['2181.01.01-pwtmm-a'] = ['data' => 'pwtmm-a', 'text' => 'Periods When to Make Money (Panic Times)', 'range'=> [2179]];

        ////////////////////////////////////////////////////////////////////////
        //
        // Nostradamus
        //
            // 2001 - Shmita Year
        $data['2001.09']    = ['text' => 'Twin Towers Disaster I', 'range'=> [1999]];
        $data['2001.10']    = ['text' => 'Twin Towers Disaster II', 'range'=> [1999]];
        $data['2002.00']    = ['text' => 'Guantanamoo Bay', 'range'=> [1999]];
        $data['2003.04']    =  ['text' => 'US/Iraq War I'];
        $data['2003.05']    = ['text' => 'US/Iraq War II'];
        $data['2003.06']    = ['text' => 'US/Iraq War III'];
        $data['2003.06-12'] = ['text' => 'US/Iraq War IV'];
        $data['2003-01-**'] = ['text' => "Aung San Suu Kyi & Burma's Military Junta"];
        $data['2004.12']    = ['text' => "Tsunami I", 'range'=> [2003]];
            // 2020
        $data['2020']       = ['text' => 'Aftermath of Roman Catholic Confederacy.  Healing of the Catholic Confederacy'];
        $data['2021.01']    = ['text' => 'Terrorist Attack in Southern France.', 'range'=> [2020]];
        $data['2021.08']    = ['text' => 'Birth of an Island', 'range'=> [2020]];
        $data['2021.09']    = ['text' => "Prince Harry's Paternity", 'range'=> [2020]];
        $data['2022.09']    = ['text' => 'Succession to the UK Throne.', 'range'=> [2020]];
        $data['2022.10']    = ['text' => 'Abdication of Charles III of England.', 'range'=> [2020]];
        $data['2022.12']    = ['text' => 'Poor Sir Bevis', 'range'=> [2020]];
        $data['2023']       = ['text' => 'New First Family -- Precursor', 'range'=> [2024]];
        $data['2024']       = ['text' => 'New First Family', 'range'=> [2024]];
        $data['2025']       = ['text' => 'Sunni/Shiite War', 'range'=> [2024]];
        $data['2027']       = ['text' => 'Six Lucky Gamblers', 'range'=> [2024]];
        $data['2028']       = ['text' => 'Discovery of the Philosophers Stone', 'range'=> [2024]];
        $data['2029.02']    = ['text' => 'The Sun I.'];
        $data['2029.04']    = ['text' => 'The Sun II'];
            // 2030
        $data['2030']       = ['text' => 'The Sun is Blotted Out & Secrets Lost', 'range'=> [2029]];
        $data['2032.01']    = ['text' => 'Political Correctness I', 'range'=> [2029]];
        $data['2032.02']    = ['text' => 'Birth of the Third Antichrist - Presage I', 'range'=> [2029]];
        $data['2032.07']    = ['text' => 'Birth of the Third Antichrist - Presage II', 'range'=> [2029]];
        $data['2032.08']    = ['text' => 'US Presidential Election', 'range'=> [2029]];
        $data['2033.01']    = ['text' => 'Class War', 'range'=> [2033]];
        $data['2034.02']    = ['text' => 'Political Correctness II', 'range'=> [2033]];
        $data['2034.03']    = ['text' => 'Political Correctness III', 'range'=> [2033]];
        $data['2034.04']    = ['text' => 'Birth of the Third Antichrist - Presage III', 'range'=> [2033]];
        $data['2035.01']    = ['text' => 'Winter Freeze', 'range'=> [2033]];
        $data['2035.02']    = ['text' => 'Birth of the Thrid Antichrist', 'range'=> [2033]];
        $data['2036']       = ['text' => 'Birth of the Thrid Antichrist - Consequences', 'range'=> [2033]];
        $data['2037']       = ['text' => 'War Between Australia & Indonesia', 'range'=> [2037]];
        $data['2039']       = ['text' => 'Greco-Turkish Problem', 'range'=> [2037]];
        $data['2040']       = ['text' => 'The Great Storm', 'range'=> [2037]];
        $data['2040.1']     = ['text' => 'End of Monarchy in Britain I', 'range'=> [2037]];
        $data['2040.2']     = ['text' => 'End of Monarchy in Britain II', 'range'=> [2037]];
        $data['2040.3']     = ['text' => 'End of Monarchy in Britain III', 'range'=> [2037]];
        $data['2041']       = ['text' => 'Birth of a Visionary Pan-African Leader', 'range'=> [2037]];
        $data['2043.1']     = ['text' => 'Religious Wars I', 'range'=> [2042]];
        $data['2043.2']     = ['text' => 'Religious Wars II', 'range'=> [2042]];

        // Sort an associative array in ascending order, according to the key
        ksort($data);

        $currentYear = date("Y");

        // TEMPLATE
        $template = '';
        foreach ($this->modelEconomicConfidenceSequence() as $sequence) {
            $template.= '<div>';

            if ($sequence[0] == 'Phase') {
                $template.= '<h3>';
                $template.= $sequence[0] . ' ' . $sequence[1] . ' ' . $sequence[2];
                $template.= '</h3>';
            } else {

                $year = (int) round($sequence[2]);

                $template.= '<section id="year-'.$year.'">';
                if ($currentYear == $year) {
                    $template.= '<h3>';
                    $template.= $year;
                    $template.= ' ';
                    $template.= '<i>' . $sequence[1] . '</i>';
                    $template.= '</h3>';

                    // Data
                    $template.= '<ul>';
                    $template.= $this->lookup($data, $year, true);
                    $template.= '</ul>';


                } else {
                    $template.= '<h4>';
                    $template.= $year;
                    $template.= ' ';
                    $template.= '<i>' . $sequence[1] . '</i>';
                    $template.= '</h4>';

                    // Data
                    $template.= '<ul>';
                    $template.= $this->lookup($data, $year);
                    $template.= '</ul>';

                }

                $template.= '<hr />';
                $template.= '</section>';
            }
            $template.= '</div>';
        }


        $template.=<<<EOT
        <script>
        window.addEventListener('DOMContentLoaded', (event) => {
          console.log("Content Loaded");

          // Function to scroll to the Economics section of the current year
          function scrollToEconomicsOfCurrentYear() {

            const currentYear = new Date().getFullYear();

            let nextAvailableYear = currentYear;
            while (!document.getElementById("year-" + nextAvailableYear)) {
              console.log("Search for Economic Year " + nextAvailableYear);
              nextAvailableYear++;
            }

            const economicsSection = document.getElementById("year-" + nextAvailableYear);
            if (economicsSection) {
              console.log("Scrolling to " + nextAvailableYear);
              economicsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
          }

          // Scroll to Economics section of current year when the page loads
          scrollToEconomicsOfCurrentYear();
        });
        </script>
EOT;


    	echo ($template);
    }

    /**
     * Model Economic Confidence Sequence.
     *
     * @param type $phase
     * @param type $phaseCycle
     * @param int $count
     * @param type $sequence
     * @param type $sequenceMaximum
     * @return string
     */
    public function modelEconomicConfidenceSequence(
            $phase           = 1934.05,
//            $phase           = 1986.05,
//            $phase           = 1986.05,
            $phaseSpace      = 4.3,
            $count           = 0,
            $sequence        = 0,
            $sequenceMaximum = 5
        )
    {
        // Data Structure
        $data = [];

        $lowHigh       = 'low';
        $publicPrivate = 'public';

        while (true) {

            $data[] = [$publicPrivate, $lowHigh, $phase];
            $phase  = $phase + $phaseSpace;

            $count++;

            ////////////////////////////////////////////////////////////////////
            // Phase Transition, 12 year cycle
            if ($count == 12 ) {
                $count = 0;
                $sequence++;

                // public, private flip flop
                if ($publicPrivate == 'public') {
                    $publicPrivate = 'private';
                } else {
                    $publicPrivate = 'public';
                }

//                $data[] = ['Phase', 'Transition ' . $publicPrivate, 'deflation' . ' ('.$sequence.')'];
                $data[] = ['Phase', 'Transition - ' . $publicPrivate, 'deflation'];
            }

            // Low High flip flop
            if ($lowHigh == 'low' ) {
                $lowHigh = 'high';
            } else {
                $lowHigh = 'low';
            }

            // End of simulation
            if ($sequence == $sequenceMaximum) {
                return $data;
            }
        }
    }

    /**
     * Look up year in a dataset range and create a templated output.
     *
     * @param type $data
     * @param type $year
     * @param type $currentYear    CurrentYear (true|false)
     * @return string
     */
    public function lookup($data, $year, $currentYear = false)
    {
        $template = '';

        foreach($data as $key => $value) {

//            $keyRound = (int) round($key);
            $keyRound = $key;

            if ($year == $keyRound || isset($value['range']) && in_array($year, $value['range'])) {

                //$text      = htmlentities($value['text']);
                $text      = ($value['text']);
                $textParts = explode("|", $text);
                $keyParts  = explode("-", $key);

                if ($year == $keyRound) {
                    $key = "<b>" . $keyParts[0] . "</b>";
                } else {
                    $key = $keyParts[0];
                }

                $keyPart = '';
                if ($currentYear) {
                    $keyPart = '<strong>' . $keyParts[0] . '</strong>';
                } else {
                    $keyPart = $keyParts[0];
                }

                $link = '';
                if (! isset($value['search'])) {
                    $link = '<a href="https://google.com/search?q=' . $keyRound . ' ' . strip_tags($textParts[0]) . '" target="_blank">' . $text . '</a>';
                } else {
                    $link = '<a href="https://google.com/search?q=' . $keyRound . ' ' . $value['search'] . '" target="_blank">' . $text . '</a>';
                }

                $template.=<<<EOT
                <li>
                    <table>
                        <tr>
                            <td width="150px">$keyPart</td>
                            <td>$link</td>
                        </tr>
                    </table>
                </li>

                EOT;

//                $template.= '<li>';
//                $template.= '<table>';
//                $template.= '<tr>';
//                $template.= '</tr>';
//                $template.= '</table>';
//                $template.= '</li>';
            }
        }
        return $template;
    }

    /**
     * Model Events
     *
     *
     */
    static public function modelEvents()
    {
        //
        // BITCOIN
        //
        // 2020 November 28     1 Red Year    = ATH
        // 2021 November 28     2 Orange Year = Bear Market
        // 2022 November 28     3 Green Year  = Accumulation
        // 2023 November 28     4 Blue Year   = Preperation

//        Fabrication::logEvent(__METHOD__, 'TESTING');

        $date = date('Ymd'); // on 28th November 2020, would have been 20201128

        // 1 ATH
        $athBegin = 20201128;
        $athEnd   = 20211128;
        $ath = ($date >= $athBegin && $date <= $athEnd) ? "Bitcoin: ATH" : "";
        if (! empty($ath)) {
            Fabrication::logEvent(__METHOD__, $ath);
        }

        // 2 Accumulation
        $bearMarketBegin = 20211128;
        $bearMarketEnd   = 20221128;
        $bearMarket = ($date >= $bearMarketBegin && $date <= $bearMarketEnd) ? "Bitcoin: Bear Market" : "";
        if (! empty($bearMarket)) {
            Fabrication::logEvent(__METHOD__, $bearMarket);
        }

        // 3 Accumulation
        $accumulationBegin = 20221128;
        $accumulationEnd   = 20231128;
        $accumulation = ($date >= $accumulationBegin && $date <= $accumulationEnd) ? "Bitcoin: Accumulation" : "";
        if (! empty($accumulation)) {
            Fabrication::logEvent(__METHOD__, $accumulation);
        }

        // 4 Preperation
        $preperationBegin = 20231128;
        $preperationEnd   = 20241128;
        $preperation = ($date >= $preperationBegin && $date <= $preperationEnd) ? "Bitcoin: Preperation" : "";
        if (! empty($preperation)) {
            Fabrication::logEvent(__METHOD__, $preperation);
        }

        // 1 ATH
        $ath2025Begin = 20241128;
        $ath2025End   = 20251128;
        $ath2025 = ($date >= $ath2025Begin && $date <= $ath2025End) ? "Bitcoin: ATH" : "";
        if (! empty($ath2025)) {
            Fabrication::logEvent(__METHOD__, $ath2025);
        }
    }
}

$eco = new Economics;
$eco->executeIndex();
