# N digital wordpress boilerplate

This git repository is the base for all wordpress-powered projects of N digital studio.
Follow this step-by-step bulletproof plan to install a clean version of Wordpress for a next project.

### Step 1
Fork this repository to a custom repo, named after the client you're working for

### Step 2
Clone the repository to your local/remote drive

### Step 3
Go to the root of the repository using a command line interface and execute:
```
sh wp-install.sh
```

### Step 4 (optional)
Setup a virtual host if you're working on a local machine

### Step 5
Navigate to wp-content > themes > customer_base, duplicate and rename the folder to your customer's name (don't use spaces or weird chars in your folder name).

### Step 6
Using your command line interface, execute in the new theme folder:
```
yarn install
```
> Note: for this you'll need Node JS and Yarn (and Homebrew possibly)

### Step 7
Use Gulp to compile CSS, JS and optimize images.
```
gulp serve
```

### Step 8
Sit back, enjoy and smile, you've just installed a brand new -up to date- copy of wordpress.
You can now start developing. All css and javascript changes will compile automatically.

### Step 9
If the CSS file of your new theme doesn't get loaded, activate another theme and reactivate your own theme back again.
