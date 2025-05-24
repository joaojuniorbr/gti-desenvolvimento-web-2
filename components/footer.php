</article>
<footer class="bg-orange-500 text-white">
  <div class="container mx-auto text-center py-8">
    <p class="text-sm mb-1 font-bold uppercase">João Luiz Vicente Junior &copy; 2025. Todos os direitos reservados.</p>
    <p class="text-xs text-orange-200">Desenvolvimento Web 2 - Gestão de Tecnologia - IFPR</p>
  </div>
</footer>

</main>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const btn = document.querySelector('.toggleMenu');
    const menu = document.getElementById('main-menu');
    document.querySelectorAll('.toggleMenu').forEach((btn) => {
      btn.addEventListener('click', () => {
        const menu = document.getElementById('main-menu');
        menu.classList.toggle('hidden');
      });
    });
  });
</script>

</body>

</html>