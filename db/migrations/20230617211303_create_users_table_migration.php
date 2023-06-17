<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateUsersTableMigration extends AbstractMigration
{


    public function up()
    {
        $users = $this->table('users');
        $users->addColumn('name', 'string', ['limit' => 40])
            ->addColumn('email', 'string', ['limit' => 100])
            ->addColumn('password', 'string', ['limit' => 40])
            ->addColumn('created', 'datetime')
            ->addColumn('updated', 'datetime', ['null' => true])
            ->addIndex(['email'], ['unique' => true])
            ->create();
        if ($this->isMigratingUp()) {
            $length = 5;
            $random_string = substr(str_replace(['+', '/', '='], '', base64_encode(random_bytes($length))), 0, $length);
            $users->insert([['name' => "John Dole", 'email' => 'dole_' . $random_string . '@mail.com', 'created' => '2022-12-22 09:14:00']])
                ->save();
        }
    }

    public function down()
    {
        $this->table('users')->drop()->save();
    }
}
