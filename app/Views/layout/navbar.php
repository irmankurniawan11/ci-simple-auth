<nav class="navbar bg-base-100">
  <div class="container mx-auto flex items-center justify-between">
    <div class="flex-1">
      <a class="btn btn-ghost normal-case text-xl">Job Test</a>
    </div>
    <div class="flex-none flex items-center">
      <ul class="menu menu-horizontal px-1 items-center">
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <?php if (session()->get('email')) : ?>
        <div class="dropdown dropdown-end ml-2">
          <label tabindex="0" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
              <img src="https://placehold.co/100x100/red/white?text=I" />
            </div>
          </label>
          <ul tabindex="0" class="mt-3 p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
            <li><a href="<?= site_url('logout') ?>">Logout</a></li>
          </ul>
        </div>
      <?php else : ?>
        <ul class="menu menu-horizontal px-1 items-center">
          <li><a href="/login">Login</a></li>
          <li><a class="btn-primary" href="/register">Daftar</a></li>
        </ul>
      <?php endif ?>
    </div>
  </div>
</nav>