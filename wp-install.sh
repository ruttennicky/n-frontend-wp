echo "What is the name of the database?"
read dbname
echo "What is the username of the database user?"
read dbuser
echo "What is the password of the database user?"
read dbpass
echo "What is the hostnmae of the database server?"
read dbhost
echo "What is the hostame of the website?"
read sitehost
echo "What is the title of the website?"
read sitetitle
echo "What is the username of the website administrator?"
read adminuser
echo "What is the password of the website administrator?"
read adminpass
echo "What is the emailaddress of the website administrator?"
read adminemail

php wp-cli.phar core config --dbname="$dbname" --dbuser="$dbuser" --dbpass="$dbpass" --dbhost="$dbhost" --locale=nl_NL
php wp-cli.phar db create
php wp-cli.phar core install --url="$sitehost" --title="$sitetitle"  --admin_user="$adminuser" --admin_password="$adminpass" --admin_email="$adminemail"
php wp-cli.phar theme activate nfrontend
#php wp-cli.phar plugin delete hello akismet
php wp-cli.phar plugin install wordpress-seo wp-smtp-mail ninja-forms mailchimp-for-wp regenerate-thumbnails wp-email-templates
php wp-cli.phar core update
php wp-cli.phar core update-db
php wp-cli.phar plugin update --all
php wp-cli.phar core language update
