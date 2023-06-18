# CodeIngniter app for demonstration of immediate server-side form validation

It uses htmx js library and codeigniter-htmx library to make server-side validation appear immediate. 

The project is build using Codeigniter 4 framework.

To install and test: 

1. Download and extract the app as a zip or via git;

2. Install the dependencies: if you use PHP8, run in command line:

```
composer update
```

3. If you use PHP7, you will need an adapted version of codeigniter-htmx, so run: 

```
composer config repositories.codeigniter-htmx vcs git@github.com:dgvirtual/codeigniter-htmx.git
composer require michalsn/codeigniter-htmx:dev-php7port
composer update
```

4. Start the app by running:
    
```
php spark serve
```

5. Open browser at http://localhost:8080/fragment/create

