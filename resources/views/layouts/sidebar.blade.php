<div class="list-group">
  <a href="/profile" class="list-group-item list-group-item-action {{ Request::is('profile') ? 'active' : '' }}">
    My Profile
  </a>
  <a href="/books" class="list-group-item list-group-item-action {{ Request::is('books') ? 'active' : '' }}">
    All Books
  </a>
  <a href="/users" class="list-group-item list-group-item-action {{ Request::is('users') ? 'active' : '' }}">
    All Users
  </a>
  <a href="/books/create" class="list-group-item list-group-item-action {{ Request::is('books/create') ? 'active' : '' }}">
    Add Book
  </a>
</div>