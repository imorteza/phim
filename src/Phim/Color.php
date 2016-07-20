<?php

namespace Phim;

use Phim\Color\AlphaInterface;
use Phim\Color\HslaColor;
use Phim\Color\HslColor;
use Phim\Color\HsvaColor;
use Phim\Color\HsvColor;
use Phim\Color\RgbaColor;
use Phim\Color\RgbColor;
use Phim\Exception\Runtime\NonExistentFunctionNameException;

class Color
{

    const FUNCTION_REGEX = '/(\w+)\(([^\)]+)\)/';

    const HUE_AREA_RED = 'red';
    const HUE_AREA_YELLOW = 'yellow';
    const HUE_AREA_GREEN = 'green';
    const HUE_AREA_CYAN = 'cyan';
    const HUE_AREA_BLUE = 'blue';
    const HUE_AREA_MAGENTA = 'magenta';

    const ABSOLUTEZERO = '#0048BA';
    const ABBIEXXXX = '#4C2F27';
    const ACIDGREEN = '#B0BF1A';
    const AERO = '#7CB9E8';
    const AEROBLUE = '#C9FFE5';
    const AFRICANVIOLET = '#B284BE';
    const AIRFORCEBLUERAF = '#5D8AA8';
    const AIRFORCEBLUEUSAF = '#00308F';
    const AIRSUPERIORITYBLUE = '#72A0C1';
    const ALABAMACRIMSON = '#AF002A';
    const ALABASTER = '#F2F0E6';
    const ALICEBLUE = '#F0F8FF';
    const ALIENARMPIT = '#84DE02';
    const ALIZARINCRIMSON = '#E32636';
    const ALLOYORANGE = '#C46210';
    const ALMOND = '#EFDECD';
    const AMARANTH = '#E52B50';
    const AMARANTHDEEPPURPLE = '#9F2B68';
    const AMARANTHPINK = '#F19CBB';
    const AMARANTHPURPLE = '#AB274F';
    const AMARANTHRED = '#D3212D';
    const AMAZON = '#3B7A57';
    const AMAZONITE = '#00C4B0';
    const AMBER = '#FFBF00';
    const AMBERSAEECE = '#FF7E00';
    const AMERICANROSE = '#FF033E';
    const AMETHYST = '#9966CC';
    const ANDROIDGREEN = '#A4C639';
    const ANTIFLASHWHITE = '#F2F3F4';
    const ANTIQUEBRASS = '#CD9575';
    const ANTIQUEBRONZE = '#665D1E';
    const ANTIQUEFUCHSIA = '#915C83';
    const ANTIQUERUBY = '#841B2D';
    const ANTIQUEWHITE = '#FAEBD7';
    const AOENGLISH = '#008000';
    const APPLEGREEN = '#8DB600';
    const APRICOT = '#FBCEB1';
    const AQUA = '#00FFFF';
    const AQUAMARINE = '#7FFFD4';
    const ARCTICLIME = '#D0FF14';
    const ARMYGREEN = '#4B5320';
    const ARSENIC = '#3B444B';
    const ARTICHOKE = '#8F9779';
    const ARYLIDEYELLOW = '#E9D66B';
    const ASHGREY = '#B2BEB5';
    const ASPARAGUS = '#87A96B';
    const ATOMICTANGERINE = '#FF9966';
    const AUBURN = '#A52A2A';
    const AUREOLIN = '#FDEE00';
    const AUROMETALSAURUS = '#6E7F80';
    const AVOCADO = '#568203';
    const AWESOME = '#FF2052';
    const AZTECGOLD = '#C39953';
    const AZURE = '#007FFF';
    const AZUREWEBCOLOR = '#F0FFFF';
    const AZUREMIST = '#F0FFFF';
    const AZUREISHWHITE = '#DBE9F4';
    const BABYBLUE = '#89CFF0';
    const BABYBLUEEYES = '#A1CAF1';
    const BABYPINK = '#F4C2C2';
    const BABYPOWDER = '#FEFEFA';
    const BAKERMILLERPINK = '#FF91AF';
    const BALLBLUE = '#21ABCD';
    const BANANAMANIA = '#FAE7B5';
    const BANANAYELLOW = '#FFE135';
    const BANGLADESHGREEN = '#006A4E';
    const BARBIEPINK = '#E0218A';
    const BARNRED = '#7C0A02';
    const BATTERYCHARGEDBLUE = '#1DACD6';
    const BATTLESHIPGREY = '#848482';
    const BAZAAR = '#98777B';
    const BEAUBLUE = '#BCD4E6';
    const BEAVER = '#9F8170';
    const BEGONIA = '#FA6E79';
    const BEIGE = '#F5F5DC';
    const BDAZZLEDBLUE = '#2E5894';
    const BIGDIPORUBY = '#9C2542';
    const BIGFOOTFEET = '#E88E5A';
    const BISQUE = '#FFE4C4';
    const BISTRE = '#3D2B1F';
    const BISTREBROWN = '#967117';
    const BITTERLEMON = '#CAE00D';
    const BITTERLIME = '#BFFF00';
    const BITTERSWEET = '#FE6F5E';
    const BITTERSWEETSHIMMER = '#BF4F51';
    const BLACK = '#000000';
    const BLACKBEAN = '#3D0C02';
    const BLACKCORAL = '#54626F';
    const BLACKLEATHERJACKET = '#253529';
    const BLACKOLIVE = '#3B3C36';
    const BLACKSHADOWS = '#BFAFB2';
    const BLANCHEDALMOND = '#FFEBCD';
    const BLASTOFFBRONZE = '#A57164';
    const BLEUDEFRANCE = '#318CE7';
    const BLIZZARDBLUE = '#ACE5EE';
    const BLOND = '#FAF0BE';
    const BLUE = '#0000FF';
    const BLUECRAYOLA = '#1F75FE';
    const BLUEMUNSELL = '#0093AF';
    const BLUENCS = '#0087BD';
    const BLUEPANTONE = '#0018A8';
    const BLUEPIGMENT = '#333399';
    const BLUERYB = '#0247FE';
    const BLUEBELL = '#A2A2D0';
    const BLUEBOLT = '#00B9FB';
    const BLUEGRAY = '#6699CC';
    const BLUEGREEN = '#0D98BA';
    const BLUEJEANS = '#5DADEC';
    const BLUELAGOON = '#ACE5EE';
    const BLUEMAGENTAVIOLET = '#553592';
    const BLUESAPPHIRE = '#126180';
    const BLUEVIOLET = '#8A2BE2';
    const BLUEYONDER = '#5072A7';
    const BLUEBERRY = '#4F86F7';
    const BLUEBONNET = '#1C1CF0';
    const BLUSH = '#DE5D83';
    const BOLE = '#79443B';
    const BONDIBLUE = '#0095B6';
    const BONE = '#E3DAC9';
    const BOOGERBUSTER = '#DDE26A';
    const BOSTONUNIVERSITYRED = '#CC0000';
    const BOTTLEGREEN = '#006A4E';
    const BOYSENBERRY = '#873260';
    const BRANDEISBLUE = '#0070FF';
    const BRASS = '#B5A642';
    const BRICKRED = '#CB4154';
    const BRIGHTCERULEAN = '#1DACD6';
    const BRIGHTGREEN = '#66FF00';
    const BRIGHTLAVENDER = '#BF94E4';
    const BRIGHTLILAC = '#D891EF';
    const BRIGHTMAROON = '#C32148';
    const BRIGHTNAVYBLUE = '#1974D2';
    const BRIGHTPINK = '#FF007F';
    const BRIGHTTURQUOISE = '#08E8DE';
    const BRIGHTUBE = '#D19FE8';
    const BRIGHTYELLOWCRAYOLA = '#FFAA1D';
    const BRILLIANTAZURE = '#3399FF';
    const BRILLIANTLAVENDER = '#F4BBFF';
    const BRILLIANTROSE = '#FF55A3';
    const BRINKPINK = '#FB607F';
    const BRITISHRACINGGREEN = '#004225';
    const BRONZE = '#CD7F32';
    const BRONZEYELLOW = '#737000';
    const BROWNTRADITIONAL = '#964B00';
    const BROWNWEB = '#A52A2A';
    const BROWNNOSE = '#6B4423';
    const BROWNSUGAR = '#AF6E4D';
    const BROWNYELLOW = '#cc9966';
    const BRUNSWICKGREEN = '#1B4D3E';
    const BUBBLEGUM = '#FFC1CC';
    const BUBBLES = '#E7FEFF';
    const BUDGREEN = '#7BB661';
    const BUFF = '#F0DC82';
    const BULGARIANROSE = '#480607';
    const BURGUNDY = '#800020';
    const BURLYWOOD = '#DEB887';
    const BURNISHEDBROWN = '#A17A74';
    const BURNTORANGE = '#CC5500';
    const BURNTSIENNA = '#E97451';
    const BURNTUMBER = '#8A3324';
    const BYZANTINE = '#BD33A4';
    const BYZANTIUM = '#702963';
    const CADET = '#536872';
    const CADETBLUE = '#5F9EA0';
    const CADETGREY = '#91A3B0';
    const CADMIUMGREEN = '#006B3C';
    const CADMIUMORANGE = '#ED872D';
    const CADMIUMRED = '#E30022';
    const CADMIUMYELLOW = '#FFF600';
    const CAFAULAIT = '#A67B5B';
    const CAFNOIR = '#4B3621';
    const CALPOLYPOMONAGREEN = '#1E4D2B';
    const CAMBRIDGEBLUE = '#A3C1AD';
    const CAMEL = '#C19A6B';
    const CAMEOPINK = '#EFBBCC';
    const CAMOUFLAGEGREEN = '#78866B';
    const CANARY = '#FFFF99';
    const CANARYYELLOW = '#FFEF00';
    const CANDYAPPLERED = '#FF0800';
    const CANDYPINK = '#E4717A';
    const CAPRI = '#00BFFF';
    const CAPUTMORTUUM = '#592720';
    const CARDINAL = '#C41E3A';
    const CARIBBEANGREEN = '#00CC99';
    const CARMINE = '#960018';
    const CARMINEMP = '#D70040';
    const CARMINEPINK = '#EB4C42';
    const CARMINERED = '#FF0038';
    const CARNATIONPINK = '#FFA6C9';
    const CARNELIAN = '#B31B1B';
    const CAROLINABLUE = '#56A0D3';
    const CARROTORANGE = '#ED9121';
    const CASTLETONGREEN = '#00563F';
    const CATALINABLUE = '#062A78';
    const CATAWBA = '#703642';
    const CEDARCHEST = '#C95A49';
    const CEIL = '#92A1CF';
    const CELADON = '#ACE1AF';
    const CELADONBLUE = '#007BA7';
    const CELADONGREEN = '#2F847C';
    const CELESTE = '#B2FFFF';
    const CELESTIALBLUE = '#4997D0';
    const CERISE = '#DE3163';
    const CERISEPINK = '#EC3B83';
    const CERULEAN = '#007BA7';
    const CERULEANBLUE = '#2A52BE';
    const CERULEANFROST = '#6D9BC3';
    const CGBLUE = '#007AA5';
    const CGRED = '#E03C31';
    const CHAMOISEE = '#A0785A';
    const CHAMPAGNE = '#F7E7CE';
    const CHAMPAGNEPINK = '#F1DDCF';
    const CHARCOAL = '#36454F';
    const CHARLESTONGREEN = '#232B2B';
    const CHARMPINK = '#E68FAC';
    const CHARTREUSETRADITIONAL = '#DFFF00';
    const CHARTREUSEWEB = '#7FFF00';
    const CHERRY = '#DE3163';
    const CHERRYBLOSSOMPINK = '#FFB7C5';
    const CHESTNUT = '#954535';
    const CHINAPINK = '#DE6FA1';
    const CHINAROSE = '#A8516E';
    const CHINESERED = '#AA381E';
    const CHINESEVIOLET = '#856088';
    const CHLOROPHYLLGREEN = '#4AFF00';
    const CHOCOLATETRADITIONAL = '#7B3F00';
    const CHOCOLATEWEB = '#D2691E';
    const CHROMEYELLOW = '#FFA700';
    const CINEREOUS = '#98817B';
    const CINNABAR = '#E34234';
    const CINNAMONCITATIONNEEDED = '#D2691E';
    const CINNAMONSATIN = '#CD607E';
    const CITRINE = '#E4D00A';
    const CITRON = '#9FA91F';
    const CLARET = '#7F1734';
    const CLASSICROSE = '#FBCCE7';
    const COBALTBLUE = '#0047AB';
    const COCOABROWN = '#D2691E';
    const COCONUT = '#965A3E';
    const COFFEE = '#6F4E37';
    const COLUMBIABLUE = '#C4D8E2';
    const CONGOPINK = '#F88379';
    const COOLBLACK = '#002E63';
    const COOLGREY = '#8C92AC';
    const COPPER = '#B87333';
    const COPPERCRAYOLA = '#DA8A67';
    const COPPERPENNY = '#AD6F69';
    const COPPERRED = '#CB6D51';
    const COPPERROSE = '#996666';
    const COQUELICOT = '#FF3800';
    const CORAL = '#FF7F50';
    const CORALPINK = '#F88379';
    const CORALRED = '#FF4040';
    const CORALREEF = '#FD7C6E';
    const CORDOVAN = '#893F45';
    const CORN = '#FBEC5D';
    const CORNELLRED = '#B31B1B';
    const CORNFLOWERBLUE = '#6495ED';
    const CORNSILK = '#FFF8DC';
    const COSMICCOBALT = '#2E2D88';
    const COSMICLATTE = '#FFF8E7';
    const COYOTEBROWN = '#81613C';
    const COTTONCANDY = '#FFBCD9';
    const CREAM = '#FFFDD0';
    const CRIMSON = '#DC143C';
    const CRIMSONGLORY = '#BE0032';
    const CRIMSONRED = '#990000';
    const CULTURED = '#F5F5F5';
    const CYAN = '#00FFFF';
    const CYANAZURE = '#4E82B4';
    const CYANBLUEAZURE = '#4682BF';
    const CYANCOBALTBLUE = '#28589C';
    const CYANCORNFLOWERBLUE = '#188BC2';
    const CYANPROCESS = '#00B7EB';
    const CYBERGRAPE = '#58427C';
    const CYBERYELLOW = '#FFD300';
    const CYCLAMEN = '#F56FA1';
    const DAFFODIL = '#FFFF31';
    const DANDELION = '#F0E130';
    const DARKBLUE = '#00008B';
    const DARKBLUEGRAY = '#666699';
    const DARKBROWN = '#654321';
    const DARKBROWNTANGELO = '#88654E';
    const DARKBYZANTIUM = '#5D3954';
    const DARKCANDYAPPLERED = '#A40000';
    const DARKCERULEAN = '#08457E';
    const DARKCHESTNUT = '#986960';
    const DARKCORAL = '#CD5B45';
    const DARKCYAN = '#008B8B';
    const DARKELECTRICBLUE = '#536878';
    const DARKGOLDENROD = '#B8860B';
    const DARKGRAYX11 = '#A9A9A9';
    const DARKGREEN = '#013220';
    const DARKGREENX11 = '#006400';
    const DARKGUNMETAL = '#1F262A';
    const DARKIMPERIALBLUE = '#00416A';
    const DARKJUNGLEGREEN = '#1A2421';
    const DARKKHAKI = '#BDB76B';
    const DARKLAVA = '#483C32';
    const DARKLAVENDER = '#734F96';
    const DARKLIVER = '#534B4F';
    const DARKLIVERHORSES = '#543D37';
    const DARKMAGENTA = '#8B008B';
    const DARKMEDIUMGRAY = '#A9A9A9';
    const DARKMIDNIGHTBLUE = '#003366';
    const DARKMOSSGREEN = '#4A5D23';
    const DARKOLIVEGREEN = '#556B2F';
    const DARKORANGE = '#FF8C00';
    const DARKORCHID = '#9932CC';
    const DARKPASTELBLUE = '#779ECB';
    const DARKPASTELGREEN = '#03C03C';
    const DARKPASTELPURPLE = '#966FD6';
    const DARKPASTELRED = '#C23B22';
    const DARKPINK = '#E75480';
    const DARKPOWDERBLUE = '#003399';
    const DARKPUCE = '#4F3A3C';
    const DARKPURPLE = '#301934';
    const DARKRASPBERRY = '#872657';
    const DARKRED = '#8B0000';
    const DARKSALMON = '#E9967A';
    const DARKSCARLET = '#560319';
    const DARKSEAGREEN = '#8FBC8F';
    const DARKSIENNA = '#3C1414';
    const DARKSKYBLUE = '#8CBED6';
    const DARKSLATEBLUE = '#483D8B';
    const DARKSLATEGRAY = '#2F4F4F';
    const DARKSPRINGGREEN = '#177245';
    const DARKTAN = '#918151';
    const DARKTANGERINE = '#FFA812';
    const DARKTAUPE = '#483C32';
    const DARKTERRACOTTA = '#CC4E5C';
    const DARKTURQUOISE = '#00CED1';
    const DARKVANILLA = '#D1BEA8';
    const DARKVIOLET = '#9400D3';
    const DARKYELLOW = '#9B870C';
    const DARTMOUTHGREEN = '#00703C';
    const DAVYSGREY = '#555555';
    const DEBIANRED = '#D70A53';
    const DEEPAQUAMARINE = '#40826D';
    const DEEPCARMINE = '#A9203E';
    const DEEPCARMINEPINK = '#EF3038';
    const DEEPCARROTORANGE = '#E9692C';
    const DEEPCERISE = '#DA3287';
    const DEEPCHAMPAGNE = '#FAD6A5';
    const DEEPCHESTNUT = '#B94E48';
    const DEEPCOFFEE = '#704241';
    const DEEPFUCHSIA = '#C154C1';
    const DEEPGREEN = '#056608';
    const DEEPGREENCYANTURQUOISE = '#0E7C61';
    const DEEPJUNGLEGREEN = '#004B49';
    const DEEPKOAMARU = '#333366';
    const DEEPLEMON = '#F5C71A';
    const DEEPLILAC = '#9955BB';
    const DEEPMAGENTA = '#CC00CC';
    const DEEPMAROON = '#820000';
    const DEEPMAUVE = '#D473D4';
    const DEEPMOSSGREEN = '#355E3B';
    const DEEPPEACH = '#FFCBA4';
    const DEEPPINK = '#FF1493';
    const DEEPPUCE = '#A95C68';
    const DEEPRED = '#850101';
    const DEEPRUBY = '#843F5B';
    const DEEPSAFFRON = '#FF9933';
    const DEEPSKYBLUE = '#00BFFF';
    const DEEPSPACESPARKLE = '#4A646C';
    const DEEPSPRINGBUD = '#556B2F';
    const DEEPTAUPE = '#7E5E60';
    const DEEPTUSCANRED = '#66424D';
    const DEEPVIOLET = '#330066';
    const DEER = '#BA8759';
    const DENIM = '#1560BD';
    const DENIMBLUE = '#2243B6';
    const DESATURATEDCYAN = '#669999';
    const DESERT = '#C19A6B';
    const DESERTSAND = '#EDC9AF';
    const DESIRE = '#EA3C53';
    const DIAMOND = '#B9F2FF';
    const DIMGRAY = '#696969';
    const DINGYDUNGEON = '#C53151';
    const DIRT = '#9B7653';
    const DODGERBLUE = '#1E90FF';
    const DOGWOODROSE = '#D71868';
    const DOLLARBILL = '#85BB65';
    const DOLPHINGRAY = '#828E84';
    const DONKEYBROWN = '#664C28';
    const DRAB = '#967117';
    const DUKEBLUE = '#00009C';
    const DUSTSTORM = '#E5CCC9';
    const DUTCHWHITE = '#EFDFBB';
    const EARTHYELLOW = '#E1A95F';
    const EBONY = '#555D50';
    const ECRU = '#C2B280';
    const EERIEBLACK = '#1B1B1B';
    const EGGPLANT = '#614051';
    const EGGSHELL = '#F0EAD6';
    const EGYPTIANBLUE = '#1034A6';
    const ELECTRICBLUE = '#7DF9FF';
    const ELECTRICCRIMSON = '#FF003F';
    const ELECTRICCYAN = '#00FFFF';
    const ELECTRICGREEN = '#00FF00';
    const ELECTRICINDIGO = '#6F00FF';
    const ELECTRICLAVENDER = '#F4BBFF';
    const ELECTRICLIME = '#CCFF00';
    const ELECTRICPURPLE = '#BF00FF';
    const ELECTRICULTRAMARINE = '#3F00FF';
    const ELECTRICVIOLET = '#8F00FF';
    const ELECTRICYELLOW = '#FFFF33';
    const EMERALD = '#50C878';
    const EMINENCE = '#6C3082';
    const ENGLISHGREEN = '#1B4D3E';
    const ENGLISHLAVENDER = '#B48395';
    const ENGLISHRED = '#AB4B52';
    const ENGLISHVERMILLION = '#CC474B';
    const ENGLISHVIOLET = '#563C5C';
    const ETONBLUE = '#96C8A2';
    const EUCALYPTUS = '#44D7A8';
    const FALLOW = '#C19A6B';
    const FALURED = '#801818';
    const FANDANGO = '#B53389';
    const FANDANGOPINK = '#DE5285';
    const FASHIONFUCHSIA = '#F400A1';
    const FAWN = '#E5AA70';
    const FELDGRAU = '#4D5D53';
    const FELDSPAR = '#FDD5B1';
    const FERNGREEN = '#4F7942';
    const FERRARIRED = '#FF2800';
    const FIELDDRAB = '#6C541E';
    const FIERYROSE = '#FF5470';
    const FIREBRICK = '#B22222';
    const FIREENGINERED = '#CE2029';
    const FLAME = '#E25822';
    const FLAMINGOPINK = '#FC8EAC';
    const FLATTERY = '#6B4423';
    const FLAVESCENT = '#F7E98E';
    const FLAX = '#EEDC82';
    const FLIRT = '#A2006D';
    const FLORALWHITE = '#FFFAF0';
    const FLUORESCENTORANGE = '#FFBF00';
    const FLUORESCENTPINK = '#FF1493';
    const FLUORESCENTYELLOW = '#CCFF00';
    const FOLLY = '#FF004F';
    const FORESTGREENTRADITIONAL = '#014421';
    const FORESTGREENWEB = '#228B22';
    const FRENCHBEIGE = '#A67B5B';
    const FRENCHBISTRE = '#856D4D';
    const FRENCHBLUE = '#0072BB';
    const FRENCHFUCHSIA = '#FD3F92';
    const FRENCHLILAC = '#86608E';
    const FRENCHLIME = '#9EFD38';
    const FRENCHMAUVE = '#D473D4';
    const FRENCHPINK = '#FD6C9E';
    const FRENCHPLUM = '#811453';
    const FRENCHPUCE = '#4E1609';
    const FRENCHRASPBERRY = '#C72C48';
    const FRENCHROSE = '#F64A8A';
    const FRENCHSKYBLUE = '#77B5FE';
    const FRENCHVIOLET = '#8806CE';
    const FRENCHWINE = '#AC1E44';
    const FRESHAIR = '#A6E7FF';
    const FROSTBITE = '#E936A7';
    const FUCHSIA = '#FF00FF';
    const FUCHSIACRAYOLA = '#C154C1';
    const FUCHSIAPINK = '#FF77FF';
    const FUCHSIAPURPLE = '#CC397B';
    const FUCHSIAROSE = '#C74375';
    const FULVOUS = '#E48400';
    const FUZZYWUZZY = '#CC6666';

    private static $functions = [
        'rgb' => RgbColor::class,
        'rgba' => RgbaColor::class,
        'hsl' => HslColor::class,
        'hsla' => HslaColor::class,
        'hsv' => HsvColor::class,
        'hsva' => HsvaColor::class
    ];

    private static $names = [
        'absolutezero' => self::ABSOLUTEZERO,
        'abbiexxxx' => self::ABBIEXXXX,
        'acidgreen' => self::ACIDGREEN,
        'aero' => self::AERO,
        'aeroblue' => self::AEROBLUE,
        'africanviolet' => self::AFRICANVIOLET,
        'airforceblueraf' => self::AIRFORCEBLUERAF,
        'airforceblueusaf' => self::AIRFORCEBLUEUSAF,
        'airsuperiorityblue' => self::AIRSUPERIORITYBLUE,
        'alabamacrimson' => self::ALABAMACRIMSON,
        'alabaster' => self::ALABASTER,
        'aliceblue' => self::ALICEBLUE,
        'alienarmpit' => self::ALIENARMPIT,
        'alizarincrimson' => self::ALIZARINCRIMSON,
        'alloyorange' => self::ALLOYORANGE,
        'almond' => self::ALMOND,
        'amaranth' => self::AMARANTH,
        'amaranthdeeppurple' => self::AMARANTHDEEPPURPLE,
        'amaranthpink' => self::AMARANTHPINK,
        'amaranthpurple' => self::AMARANTHPURPLE,
        'amaranthred' => self::AMARANTHRED,
        'amazon' => self::AMAZON,
        'amazonite' => self::AMAZONITE,
        'amber' => self::AMBER,
        'ambersaeece' => self::AMBERSAEECE,
        'americanrose' => self::AMERICANROSE,
        'amethyst' => self::AMETHYST,
        'androidgreen' => self::ANDROIDGREEN,
        'antiflashwhite' => self::ANTIFLASHWHITE,
        'antiquebrass' => self::ANTIQUEBRASS,
        'antiquebronze' => self::ANTIQUEBRONZE,
        'antiquefuchsia' => self::ANTIQUEFUCHSIA,
        'antiqueruby' => self::ANTIQUERUBY,
        'antiquewhite' => self::ANTIQUEWHITE,
        'aoenglish' => self::AOENGLISH,
        'applegreen' => self::APPLEGREEN,
        'apricot' => self::APRICOT,
        'aqua' => self::AQUA,
        'aquamarine' => self::AQUAMARINE,
        'arcticlime' => self::ARCTICLIME,
        'armygreen' => self::ARMYGREEN,
        'arsenic' => self::ARSENIC,
        'artichoke' => self::ARTICHOKE,
        'arylideyellow' => self::ARYLIDEYELLOW,
        'ashgrey' => self::ASHGREY,
        'asparagus' => self::ASPARAGUS,
        'atomictangerine' => self::ATOMICTANGERINE,
        'auburn' => self::AUBURN,
        'aureolin' => self::AUREOLIN,
        'aurometalsaurus' => self::AUROMETALSAURUS,
        'avocado' => self::AVOCADO,
        'awesome' => self::AWESOME,
        'aztecgold' => self::AZTECGOLD,
        'azure' => self::AZURE,
        'azurewebcolor' => self::AZUREWEBCOLOR,
        'azuremist' => self::AZUREMIST,
        'azureishwhite' => self::AZUREISHWHITE,
        'babyblue' => self::BABYBLUE,
        'babyblueeyes' => self::BABYBLUEEYES,
        'babypink' => self::BABYPINK,
        'babypowder' => self::BABYPOWDER,
        'bakermillerpink' => self::BAKERMILLERPINK,
        'ballblue' => self::BALLBLUE,
        'bananamania' => self::BANANAMANIA,
        'bananayellow' => self::BANANAYELLOW,
        'bangladeshgreen' => self::BANGLADESHGREEN,
        'barbiepink' => self::BARBIEPINK,
        'barnred' => self::BARNRED,
        'batterychargedblue' => self::BATTERYCHARGEDBLUE,
        'battleshipgrey' => self::BATTLESHIPGREY,
        'bazaar' => self::BAZAAR,
        'beaublue' => self::BEAUBLUE,
        'beaver' => self::BEAVER,
        'begonia' => self::BEGONIA,
        'beige' => self::BEIGE,
        'bdazzledblue' => self::BDAZZLEDBLUE,
        'bigdiporuby' => self::BIGDIPORUBY,
        'bigfootfeet' => self::BIGFOOTFEET,
        'bisque' => self::BISQUE,
        'bistre' => self::BISTRE,
        'bistrebrown' => self::BISTREBROWN,
        'bitterlemon' => self::BITTERLEMON,
        'bitterlime' => self::BITTERLIME,
        'bittersweet' => self::BITTERSWEET,
        'bittersweetshimmer' => self::BITTERSWEETSHIMMER,
        'black' => self::BLACK,
        'blackbean' => self::BLACKBEAN,
        'blackcoral' => self::BLACKCORAL,
        'blackleatherjacket' => self::BLACKLEATHERJACKET,
        'blackolive' => self::BLACKOLIVE,
        'blackshadows' => self::BLACKSHADOWS,
        'blanchedalmond' => self::BLANCHEDALMOND,
        'blastoffbronze' => self::BLASTOFFBRONZE,
        'bleudefrance' => self::BLEUDEFRANCE,
        'blizzardblue' => self::BLIZZARDBLUE,
        'blond' => self::BLOND,
        'blue' => self::BLUE,
        'bluecrayola' => self::BLUECRAYOLA,
        'bluemunsell' => self::BLUEMUNSELL,
        'bluencs' => self::BLUENCS,
        'bluepantone' => self::BLUEPANTONE,
        'bluepigment' => self::BLUEPIGMENT,
        'blueryb' => self::BLUERYB,
        'bluebell' => self::BLUEBELL,
        'bluebolt' => self::BLUEBOLT,
        'bluegray' => self::BLUEGRAY,
        'bluegreen' => self::BLUEGREEN,
        'bluejeans' => self::BLUEJEANS,
        'bluelagoon' => self::BLUELAGOON,
        'bluemagentaviolet' => self::BLUEMAGENTAVIOLET,
        'bluesapphire' => self::BLUESAPPHIRE,
        'blueviolet' => self::BLUEVIOLET,
        'blueyonder' => self::BLUEYONDER,
        'blueberry' => self::BLUEBERRY,
        'bluebonnet' => self::BLUEBONNET,
        'blush' => self::BLUSH,
        'bole' => self::BOLE,
        'bondiblue' => self::BONDIBLUE,
        'bone' => self::BONE,
        'boogerbuster' => self::BOOGERBUSTER,
        'bostonuniversityred' => self::BOSTONUNIVERSITYRED,
        'bottlegreen' => self::BOTTLEGREEN,
        'boysenberry' => self::BOYSENBERRY,
        'brandeisblue' => self::BRANDEISBLUE,
        'brass' => self::BRASS,
        'brickred' => self::BRICKRED,
        'brightcerulean' => self::BRIGHTCERULEAN,
        'brightgreen' => self::BRIGHTGREEN,
        'brightlavender' => self::BRIGHTLAVENDER,
        'brightlilac' => self::BRIGHTLILAC,
        'brightmaroon' => self::BRIGHTMAROON,
        'brightnavyblue' => self::BRIGHTNAVYBLUE,
        'brightpink' => self::BRIGHTPINK,
        'brightturquoise' => self::BRIGHTTURQUOISE,
        'brightube' => self::BRIGHTUBE,
        'brightyellowcrayola' => self::BRIGHTYELLOWCRAYOLA,
        'brilliantazure' => self::BRILLIANTAZURE,
        'brilliantlavender' => self::BRILLIANTLAVENDER,
        'brilliantrose' => self::BRILLIANTROSE,
        'brinkpink' => self::BRINKPINK,
        'britishracinggreen' => self::BRITISHRACINGGREEN,
        'bronze' => self::BRONZE,
        'bronzeyellow' => self::BRONZEYELLOW,
        'browntraditional' => self::BROWNTRADITIONAL,
        'brownweb' => self::BROWNWEB,
        'brownnose' => self::BROWNNOSE,
        'brownsugar' => self::BROWNSUGAR,
        'brownyellow' => self::BROWNYELLOW,
        'brunswickgreen' => self::BRUNSWICKGREEN,
        'bubblegum' => self::BUBBLEGUM,
        'bubbles' => self::BUBBLES,
        'budgreen' => self::BUDGREEN,
        'buff' => self::BUFF,
        'bulgarianrose' => self::BULGARIANROSE,
        'burgundy' => self::BURGUNDY,
        'burlywood' => self::BURLYWOOD,
        'burnishedbrown' => self::BURNISHEDBROWN,
        'burntorange' => self::BURNTORANGE,
        'burntsienna' => self::BURNTSIENNA,
        'burntumber' => self::BURNTUMBER,
        'byzantine' => self::BYZANTINE,
        'byzantium' => self::BYZANTIUM,
        'cadet' => self::CADET,
        'cadetblue' => self::CADETBLUE,
        'cadetgrey' => self::CADETGREY,
        'cadmiumgreen' => self::CADMIUMGREEN,
        'cadmiumorange' => self::CADMIUMORANGE,
        'cadmiumred' => self::CADMIUMRED,
        'cadmiumyellow' => self::CADMIUMYELLOW,
        'cafaulait' => self::CAFAULAIT,
        'cafnoir' => self::CAFNOIR,
        'calpolypomonagreen' => self::CALPOLYPOMONAGREEN,
        'cambridgeblue' => self::CAMBRIDGEBLUE,
        'camel' => self::CAMEL,
        'cameopink' => self::CAMEOPINK,
        'camouflagegreen' => self::CAMOUFLAGEGREEN,
        'canary' => self::CANARY,
        'canaryyellow' => self::CANARYYELLOW,
        'candyapplered' => self::CANDYAPPLERED,
        'candypink' => self::CANDYPINK,
        'capri' => self::CAPRI,
        'caputmortuum' => self::CAPUTMORTUUM,
        'cardinal' => self::CARDINAL,
        'caribbeangreen' => self::CARIBBEANGREEN,
        'carmine' => self::CARMINE,
        'carminemp' => self::CARMINEMP,
        'carminepink' => self::CARMINEPINK,
        'carminered' => self::CARMINERED,
        'carnationpink' => self::CARNATIONPINK,
        'carnelian' => self::CARNELIAN,
        'carolinablue' => self::CAROLINABLUE,
        'carrotorange' => self::CARROTORANGE,
        'castletongreen' => self::CASTLETONGREEN,
        'catalinablue' => self::CATALINABLUE,
        'catawba' => self::CATAWBA,
        'cedarchest' => self::CEDARCHEST,
        'ceil' => self::CEIL,
        'celadon' => self::CELADON,
        'celadonblue' => self::CELADONBLUE,
        'celadongreen' => self::CELADONGREEN,
        'celeste' => self::CELESTE,
        'celestialblue' => self::CELESTIALBLUE,
        'cerise' => self::CERISE,
        'cerisepink' => self::CERISEPINK,
        'cerulean' => self::CERULEAN,
        'ceruleanblue' => self::CERULEANBLUE,
        'ceruleanfrost' => self::CERULEANFROST,
        'cgblue' => self::CGBLUE,
        'cgred' => self::CGRED,
        'chamoisee' => self::CHAMOISEE,
        'champagne' => self::CHAMPAGNE,
        'champagnepink' => self::CHAMPAGNEPINK,
        'charcoal' => self::CHARCOAL,
        'charlestongreen' => self::CHARLESTONGREEN,
        'charmpink' => self::CHARMPINK,
        'chartreusetraditional' => self::CHARTREUSETRADITIONAL,
        'chartreuseweb' => self::CHARTREUSEWEB,
        'cherry' => self::CHERRY,
        'cherryblossompink' => self::CHERRYBLOSSOMPINK,
        'chestnut' => self::CHESTNUT,
        'chinapink' => self::CHINAPINK,
        'chinarose' => self::CHINAROSE,
        'chinesered' => self::CHINESERED,
        'chineseviolet' => self::CHINESEVIOLET,
        'chlorophyllgreen' => self::CHLOROPHYLLGREEN,
        'chocolatetraditional' => self::CHOCOLATETRADITIONAL,
        'chocolateweb' => self::CHOCOLATEWEB,
        'chromeyellow' => self::CHROMEYELLOW,
        'cinereous' => self::CINEREOUS,
        'cinnabar' => self::CINNABAR,
        'cinnamoncitationneeded' => self::CINNAMONCITATIONNEEDED,
        'cinnamonsatin' => self::CINNAMONSATIN,
        'citrine' => self::CITRINE,
        'citron' => self::CITRON,
        'claret' => self::CLARET,
        'classicrose' => self::CLASSICROSE,
        'cobaltblue' => self::COBALTBLUE,
        'cocoabrown' => self::COCOABROWN,
        'coconut' => self::COCONUT,
        'coffee' => self::COFFEE,
        'columbiablue' => self::COLUMBIABLUE,
        'congopink' => self::CONGOPINK,
        'coolblack' => self::COOLBLACK,
        'coolgrey' => self::COOLGREY,
        'copper' => self::COPPER,
        'coppercrayola' => self::COPPERCRAYOLA,
        'copperpenny' => self::COPPERPENNY,
        'copperred' => self::COPPERRED,
        'copperrose' => self::COPPERROSE,
        'coquelicot' => self::COQUELICOT,
        'coral' => self::CORAL,
        'coralpink' => self::CORALPINK,
        'coralred' => self::CORALRED,
        'coralreef' => self::CORALREEF,
        'cordovan' => self::CORDOVAN,
        'corn' => self::CORN,
        'cornellred' => self::CORNELLRED,
        'cornflowerblue' => self::CORNFLOWERBLUE,
        'cornsilk' => self::CORNSILK,
        'cosmiccobalt' => self::COSMICCOBALT,
        'cosmiclatte' => self::COSMICLATTE,
        'coyotebrown' => self::COYOTEBROWN,
        'cottoncandy' => self::COTTONCANDY,
        'cream' => self::CREAM,
        'crimson' => self::CRIMSON,
        'crimsonglory' => self::CRIMSONGLORY,
        'crimsonred' => self::CRIMSONRED,
        'cultured' => self::CULTURED,
        'cyan' => self::CYAN,
        'cyanazure' => self::CYANAZURE,
        'cyanblueazure' => self::CYANBLUEAZURE,
        'cyancobaltblue' => self::CYANCOBALTBLUE,
        'cyancornflowerblue' => self::CYANCORNFLOWERBLUE,
        'cyanprocess' => self::CYANPROCESS,
        'cybergrape' => self::CYBERGRAPE,
        'cyberyellow' => self::CYBERYELLOW,
        'cyclamen' => self::CYCLAMEN,
        'daffodil' => self::DAFFODIL,
        'dandelion' => self::DANDELION,
        'darkblue' => self::DARKBLUE,
        'darkbluegray' => self::DARKBLUEGRAY,
        'darkbrown' => self::DARKBROWN,
        'darkbrowntangelo' => self::DARKBROWNTANGELO,
        'darkbyzantium' => self::DARKBYZANTIUM,
        'darkcandyapplered' => self::DARKCANDYAPPLERED,
        'darkcerulean' => self::DARKCERULEAN,
        'darkchestnut' => self::DARKCHESTNUT,
        'darkcoral' => self::DARKCORAL,
        'darkcyan' => self::DARKCYAN,
        'darkelectricblue' => self::DARKELECTRICBLUE,
        'darkgoldenrod' => self::DARKGOLDENROD,
        'darkgrayx11' => self::DARKGRAYX11,
        'darkgreen' => self::DARKGREEN,
        'darkgreenx11' => self::DARKGREENX11,
        'darkgunmetal' => self::DARKGUNMETAL,
        'darkimperialblue' => self::DARKIMPERIALBLUE,
        'darkjunglegreen' => self::DARKJUNGLEGREEN,
        'darkkhaki' => self::DARKKHAKI,
        'darklava' => self::DARKLAVA,
        'darklavender' => self::DARKLAVENDER,
        'darkliver' => self::DARKLIVER,
        'darkliverhorses' => self::DARKLIVERHORSES,
        'darkmagenta' => self::DARKMAGENTA,
        'darkmediumgray' => self::DARKMEDIUMGRAY,
        'darkmidnightblue' => self::DARKMIDNIGHTBLUE,
        'darkmossgreen' => self::DARKMOSSGREEN,
        'darkolivegreen' => self::DARKOLIVEGREEN,
        'darkorange' => self::DARKORANGE,
        'darkorchid' => self::DARKORCHID,
        'darkpastelblue' => self::DARKPASTELBLUE,
        'darkpastelgreen' => self::DARKPASTELGREEN,
        'darkpastelpurple' => self::DARKPASTELPURPLE,
        'darkpastelred' => self::DARKPASTELRED,
        'darkpink' => self::DARKPINK,
        'darkpowderblue' => self::DARKPOWDERBLUE,
        'darkpuce' => self::DARKPUCE,
        'darkpurple' => self::DARKPURPLE,
        'darkraspberry' => self::DARKRASPBERRY,
        'darkred' => self::DARKRED,
        'darksalmon' => self::DARKSALMON,
        'darkscarlet' => self::DARKSCARLET,
        'darkseagreen' => self::DARKSEAGREEN,
        'darksienna' => self::DARKSIENNA,
        'darkskyblue' => self::DARKSKYBLUE,
        'darkslateblue' => self::DARKSLATEBLUE,
        'darkslategray' => self::DARKSLATEGRAY,
        'darkspringgreen' => self::DARKSPRINGGREEN,
        'darktan' => self::DARKTAN,
        'darktangerine' => self::DARKTANGERINE,
        'darktaupe' => self::DARKTAUPE,
        'darkterracotta' => self::DARKTERRACOTTA,
        'darkturquoise' => self::DARKTURQUOISE,
        'darkvanilla' => self::DARKVANILLA,
        'darkviolet' => self::DARKVIOLET,
        'darkyellow' => self::DARKYELLOW,
        'dartmouthgreen' => self::DARTMOUTHGREEN,
        'davysgrey' => self::DAVYSGREY,
        'debianred' => self::DEBIANRED,
        'deepaquamarine' => self::DEEPAQUAMARINE,
        'deepcarmine' => self::DEEPCARMINE,
        'deepcarminepink' => self::DEEPCARMINEPINK,
        'deepcarrotorange' => self::DEEPCARROTORANGE,
        'deepcerise' => self::DEEPCERISE,
        'deepchampagne' => self::DEEPCHAMPAGNE,
        'deepchestnut' => self::DEEPCHESTNUT,
        'deepcoffee' => self::DEEPCOFFEE,
        'deepfuchsia' => self::DEEPFUCHSIA,
        'deepgreen' => self::DEEPGREEN,
        'deepgreencyanturquoise' => self::DEEPGREENCYANTURQUOISE,
        'deepjunglegreen' => self::DEEPJUNGLEGREEN,
        'deepkoamaru' => self::DEEPKOAMARU,
        'deeplemon' => self::DEEPLEMON,
        'deeplilac' => self::DEEPLILAC,
        'deepmagenta' => self::DEEPMAGENTA,
        'deepmaroon' => self::DEEPMAROON,
        'deepmauve' => self::DEEPMAUVE,
        'deepmossgreen' => self::DEEPMOSSGREEN,
        'deeppeach' => self::DEEPPEACH,
        'deeppink' => self::DEEPPINK,
        'deeppuce' => self::DEEPPUCE,
        'deepred' => self::DEEPRED,
        'deepruby' => self::DEEPRUBY,
        'deepsaffron' => self::DEEPSAFFRON,
        'deepskyblue' => self::DEEPSKYBLUE,
        'deepspacesparkle' => self::DEEPSPACESPARKLE,
        'deepspringbud' => self::DEEPSPRINGBUD,
        'deeptaupe' => self::DEEPTAUPE,
        'deeptuscanred' => self::DEEPTUSCANRED,
        'deepviolet' => self::DEEPVIOLET,
        'deer' => self::DEER,
        'denim' => self::DENIM,
        'denimblue' => self::DENIMBLUE,
        'desaturatedcyan' => self::DESATURATEDCYAN,
        'desert' => self::DESERT,
        'desertsand' => self::DESERTSAND,
        'desire' => self::DESIRE,
        'diamond' => self::DIAMOND,
        'dimgray' => self::DIMGRAY,
        'dingydungeon' => self::DINGYDUNGEON,
        'dirt' => self::DIRT,
        'dodgerblue' => self::DODGERBLUE,
        'dogwoodrose' => self::DOGWOODROSE,
        'dollarbill' => self::DOLLARBILL,
        'dolphingray' => self::DOLPHINGRAY,
        'donkeybrown' => self::DONKEYBROWN,
        'drab' => self::DRAB,
        'dukeblue' => self::DUKEBLUE,
        'duststorm' => self::DUSTSTORM,
        'dutchwhite' => self::DUTCHWHITE,
        'earthyellow' => self::EARTHYELLOW,
        'ebony' => self::EBONY,
        'ecru' => self::ECRU,
        'eerieblack' => self::EERIEBLACK,
        'eggplant' => self::EGGPLANT,
        'eggshell' => self::EGGSHELL,
        'egyptianblue' => self::EGYPTIANBLUE,
        'electricblue' => self::ELECTRICBLUE,
        'electriccrimson' => self::ELECTRICCRIMSON,
        'electriccyan' => self::ELECTRICCYAN,
        'electricgreen' => self::ELECTRICGREEN,
        'electricindigo' => self::ELECTRICINDIGO,
        'electriclavender' => self::ELECTRICLAVENDER,
        'electriclime' => self::ELECTRICLIME,
        'electricpurple' => self::ELECTRICPURPLE,
        'electricultramarine' => self::ELECTRICULTRAMARINE,
        'electricviolet' => self::ELECTRICVIOLET,
        'electricyellow' => self::ELECTRICYELLOW,
        'emerald' => self::EMERALD,
        'eminence' => self::EMINENCE,
        'englishgreen' => self::ENGLISHGREEN,
        'englishlavender' => self::ENGLISHLAVENDER,
        'englishred' => self::ENGLISHRED,
        'englishvermillion' => self::ENGLISHVERMILLION,
        'englishviolet' => self::ENGLISHVIOLET,
        'etonblue' => self::ETONBLUE,
        'eucalyptus' => self::EUCALYPTUS,
        'fallow' => self::FALLOW,
        'falured' => self::FALURED,
        'fandango' => self::FANDANGO,
        'fandangopink' => self::FANDANGOPINK,
        'fashionfuchsia' => self::FASHIONFUCHSIA,
        'fawn' => self::FAWN,
        'feldgrau' => self::FELDGRAU,
        'feldspar' => self::FELDSPAR,
        'ferngreen' => self::FERNGREEN,
        'ferrarired' => self::FERRARIRED,
        'fielddrab' => self::FIELDDRAB,
        'fieryrose' => self::FIERYROSE,
        'firebrick' => self::FIREBRICK,
        'fireenginered' => self::FIREENGINERED,
        'flame' => self::FLAME,
        'flamingopink' => self::FLAMINGOPINK,
        'flattery' => self::FLATTERY,
        'flavescent' => self::FLAVESCENT,
        'flax' => self::FLAX,
        'flirt' => self::FLIRT,
        'floralwhite' => self::FLORALWHITE,
        'fluorescentorange' => self::FLUORESCENTORANGE,
        'fluorescentpink' => self::FLUORESCENTPINK,
        'fluorescentyellow' => self::FLUORESCENTYELLOW,
        'folly' => self::FOLLY,
        'forestgreentraditional' => self::FORESTGREENTRADITIONAL,
        'forestgreenweb' => self::FORESTGREENWEB,
        'frenchbeige' => self::FRENCHBEIGE,
        'frenchbistre' => self::FRENCHBISTRE,
        'frenchblue' => self::FRENCHBLUE,
        'frenchfuchsia' => self::FRENCHFUCHSIA,
        'frenchlilac' => self::FRENCHLILAC,
        'frenchlime' => self::FRENCHLIME,
        'frenchmauve' => self::FRENCHMAUVE,
        'frenchpink' => self::FRENCHPINK,
        'frenchplum' => self::FRENCHPLUM,
        'frenchpuce' => self::FRENCHPUCE,
        'frenchraspberry' => self::FRENCHRASPBERRY,
        'frenchrose' => self::FRENCHROSE,
        'frenchskyblue' => self::FRENCHSKYBLUE,
        'frenchviolet' => self::FRENCHVIOLET,
        'frenchwine' => self::FRENCHWINE,
        'freshair' => self::FRESHAIR,
        'frostbite' => self::FROSTBITE,
        'fuchsia' => self::FUCHSIA,
        'fuchsiacrayola' => self::FUCHSIACRAYOLA,
        'fuchsiapink' => self::FUCHSIAPINK,
        'fuchsiapurple' => self::FUCHSIAPURPLE,
        'fuchsiarose' => self::FUCHSIAROSE,
        'fulvous' => self::FULVOUS,
        'fuzzywuzzy' => self::FUZZYWUZZY
    ];

    private function __construct() {}

    /**
     * @return array
     */
    public static function getFunctions()
    {

        return self::$functions;
    }

    /**
     * @return array
     */
    public static function getNames()
    {

        return self::$names;
    }

    public static function parseName($string)
    {

        $name = strtolower($string);

        if (!isset(self::$names[$name]))
            return null;

        return self::parseHexString(self::$names[$name]);
    }

    public static function register($name, $hexString)
    {

        self::$names[$name] = $hexString;
    }

    public static function parseHexString($string)
    {

        if (empty($string) || $string[0] !== '#')
            return null;

        $string = ltrim($string, '#');
        $len = strlen($string);
        switch ($len) {
            case 3:
                return new RgbColor(
                    hexdec(substr($string,0,1).substr($string,0,1)),
                    hexdec(substr($string,1,1).substr($string,1,1)),
                    hexdec(substr($string,2,1).substr($string,2,1))
                );
            case 4:
                return new RgbaColor(
                    hexdec(substr($string,0,1).substr($string,0,1)),
                    hexdec(substr($string,1,1).substr($string,1,1)),
                    hexdec(substr($string,2,1).substr($string,2,1)),
                    hexdec(substr($string,3,1).substr($string,3,1)) / 255
                );
            case 6:
                return new RgbColor(
                    hexdec(substr($string,0,2)),
                    hexdec(substr($string,2,2)),
                    hexdec(substr($string,4,2))
                );
            case 8:
                return new RgbColor(
                    hexdec(substr($string,0,2)),
                    hexdec(substr($string,2,2)),
                    hexdec(substr($string,4,2)),
                    hexdec(substr($string,6,2)) / 255
                );
        }

        throw new \InvalidArgumentException(
            "The color passed seems to be a hex string, but has neither 3 nor 6 characters"
        );
    }

    public static function parseFunctionString($string)
    {

        if (!preg_match(self::FUNCTION_REGEX, $string, $matches))
            return null;

        $function = $matches[1];
        $args = array_map('trim', explode(',', $matches[2]));

        if (!isset(self::$functions[$function]))
            return new NonExistentFunctionNameException(
                "Color function $function is not registered"
            );

        $className = self::$functions[$function];
        return new $className(...$args);
    }

    public static function getHexString(ColorInterface $color)
    {

        /** @var RgbaColor $rgb */
        $rgb = $color instanceof AlphaInterface
            ? $color->getRgba()
            : $color->getRgb();

        $hex = '#';
        $hex .= str_pad(dechex($rgb->getRed()), 2, '0', STR_PAD_LEFT);
        $hex .= str_pad(dechex($rgb->getGreen()), 2, '0', STR_PAD_LEFT);
        $hex .= str_pad(dechex($rgb->getBlue()), 2, '0', STR_PAD_LEFT);

        if ($rgb instanceof RgbaColor)
            $hex .= str_pad(dechex($rgb->getAlpha() * 255), 2, '0', STR_PAD_LEFT);

        return $hex;
    }

    public static function fromString($string)
    {

        if (empty($string))
            return new RgbColor(0,0,0);

        if ($color = self::parseName($string))
            return $color;

        if ($color = self::parseHexString($string))
            return $color;

        if ($color = self::parseFunctionString($string))
            return $color;

        return null;
    }

    public static function mix(ColorInterface $color, ColorInterface $mixColor)
    {

        if ($color instanceof AlphaInterface) {
        
            $color = $color->getRgba();
            $mixColor = $mixColor->getRgba();
            
            return new RgbaColor(
                (int)(($color->getRed() + $mixColor->getRed()) / 2),
                (int)(($color->getGreen() + $mixColor->getGreen()) / 2),
                (int)(($color->getBlue() + $mixColor->getBlue()) / 2),
                (float)(($color->getAlpha() + $mixColor->getAlpha()) / 2)
            );
        }
        
        $color = $color->getRgb();
        $mixColor = $mixColor->getRgb();
        
        return new RgbColor(
            (int)(($color->getRed() + $mixColor->getRed()) / 2),
            (int)(($color->getGreen() + $mixColor->getGreen()) / 2),
            (int)(($color->getBlue() + $mixColor->getBlue()) / 2)
        );
    }

    public static function getHueArea($hue)
    {

        if ($hue > 30 && $hue <= 90)
            return self::HUE_AREA_YELLOW;

        if ($hue > 90 && $hue <= 150)
            return self::HUE_AREA_GREEN;

        if ($hue > 150 && $hue <= 210)
            return self::HUE_AREA_CYAN;

        if ($hue > 210 && $hue <= 270)
            return self::HUE_AREA_BLUE;

        if ($hue > 270 && $hue <= 330)
            return self::HUE_AREA_MAGENTA;

        return self::HUE_AREA_RED;
    }

    public static function isHueArea($hue, $area)
    {

        return self::getHueArea($hue) === $area;
    }
}