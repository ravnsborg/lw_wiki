
## About
This application is a personal organization tool designed for storing and managing various types of notes —such as tasks, ideas, code snippets, etc— referred to as articles. Articles are organized into categories, making it easy to group related content and quickly retrieve information through search.

Think of it as your own searchable knowledge base, tailored to your needs.

---

## Setup

1. If you don't already have Docker Desktop, run this step first to install the Docker Desktop application on your computer. You will download that from
   https://www.docker.com, be sure to choose the correct version for your computer(Apple chip vs Intel).

2. Once you've installed Docker and it is running, clone this repository to your computer.

4. In the terminal, run the following command to install the framework and other composer packages that are needed.

   ``` composer install```

5. Once packages are installed, copy the `.env.example` to `.env` and add your DB configuration
    ```
    APP_URL=http://127.0.0.1:1234 // Add your own port number
    APP_PORT=1234
    
    DB_CONNECTION=mysql
    DB_HOST=host.docker.internal //For DB instance outside of docker container
   ```

6. Run DB migrations to setup your table schema
    ```sail artisan migrate```

7. Now you need to bring up the containers with the following command:
    ```./vendor/bin/sail up -d```

8. Setup the node package manager then start it up.
    ```
    npm install
    npm run dev
    ```

---

## Code Style with Pint "manual"

This is using Laravel's code style preset called Pint. To ensure that your code is formatted correctly, run:

    ./vendor/bin/sail composer pint

This will reformat all files to match the coding style. Not just the files you've changed.

If you want to just see what files are not formatted correctly, run:
    ```
    ./vendor/bin/sail composer pint-test
    ```

## Code Style with Pint "automatic"
Another option is to have Pint run automatically on code commits.

Run the following commands.

    mkdir -p .git/hooks
    touch .git/hooks/pre-commit
    chmod +x .git/hooks/pre-commit    

Then edit this file: `.git/hooks/pre-commit`


    #!/bin/sh
    
    echo "Running Laravel Pint via Sail..."
    
    ./vendor/bin/sail pint
    
    if [ $? -ne 0 ]; then
    echo "Pint failed. Please fix formatting before committing."
    exit 1
    fi



---

### Test "Seeder" Content
There are DB seeders in this applicaiton for populating your database with sample content if you so choose.

    ./vendor/bin/sail artisan db::seed
