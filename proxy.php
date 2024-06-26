<?php
// Verifica se a URL do vídeo foi fornecida
if (!isset($_GET['url'])) {
    die('URL do vídeo não especificada.');
}

// URL do vídeo no GitHub Releases (exemplo)
$videoUrl = $_GET['url'];

// Função para buscar o conteúdo da URL alvo
function fetchURL($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

// Obtém o conteúdo da URL alvo via proxy
$content = fetchURL($videoUrl);

// Exibe o conteúdo como resposta
echo $content;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Proxy e Reprodutor de Vídeos</title>
<!-- Estilos para o reprodutor de vídeo (exemplo com Video.js) -->
<link href="https://vjs.zencdn.net/7.15.4/video-js.css" rel="stylesheet">
<style>
    body { font-family: Arial, sans-serif; }
    .video-container { margin-top: 20px; }
</style>
</head>
<body>

<div class="container">
    <h1>Proxy e Reprodutor de Vídeos</h1>

    <!-- Formulário para inserir a URL do vídeo -->
    <form action="" method="get">
        <label for="videoUrl">Insira a URL do vídeo do GitHub Releases:</label>
        <input type="text" id="videoUrl" name="url" placeholder="Insira a URL do vídeo...">
        <button type="submit">Reproduzir</button>
    </form>

    <!-- Div para exibir o reprodutor de vídeo -->
    <div class="video-container">
        <video id="my-video" class="video-js" controls preload="auto" width="640" height="264">
            <source src="<?php echo htmlspecialchars($videoUrl); ?>" type="video/mp4">
            <p class="vjs-no-js">
                Para assistir este vídeo, ative o JavaScript e considere atualizar para um navegador que suporte vídeos HTML5.
            </p>
        </video>
    </div>
</div>

<!-- Scripts para o reprodutor de vídeo (exemplo com Video.js) -->
<script src="https://vjs.zencdn.net/7.15.4/video.min.js"></script>
<script>
    // Inicializa O reprodutor de vídeo
    var player = videojs('my-video');
</script>

</body>
</html>