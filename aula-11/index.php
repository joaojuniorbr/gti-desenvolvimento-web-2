<?php include './config.php'; ?>

<?php
$configuration = [
  'title' => 'Aula 11',
];
include '../components/header.php';
?>
<div class="container mx-auto py-10">
  <div id="swagger-ui"></div>
</div>

<script src="https://unpkg.com/swagger-ui-dist@5.11.0/swagger-ui-bundle.js" crossorigin></script>
<script>
  window.onload = () => {
    window.ui = SwaggerUIBundle({
      url: './swagger.json',
      dom_id: '#swagger-ui',
    });
  };
</script>
<?php include '../components/footer.php'; ?>