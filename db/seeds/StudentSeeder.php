<?php


use Phinx\Seed\AbstractSeed;

class StudentSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {

        $this->table('student')->truncate();

        $data = [
            [
                'studentid'    => '30000000',
                'password'    => password_hash('test', PASSWORD_DEFAULT),
                'dob'    => date('1995-06-16'),
                'firstname'     => 'Izzy',
                'lastname'      => 'Thorpe',
                'house'     => 'Flat 8 Dexter Close',
                'town'      => 'St Albans',
                'county'        => 'Herts',
                'country'       => 'UK',
                'postcode'      => 'AL1 0GH',
            ],

            [
                'studentid'    => '40000000',
                'password'    => password_hash('test', PASSWORD_DEFAULT),
                'dob'    => date('1996-02-11'),
                'firstname'     => 'Sammy',
                'lastname'      => 'Maitland',
                'house'     => '25 Avenue Road',
                'town'      => 'Harpenden',
                'county'        => 'Herts',
                'country'       => 'UK',
                'postcode'      => 'AL5 8UH',
            ],

            [
                'studentid'    => '50000000',
                'password'    => password_hash('test', PASSWORD_DEFAULT),
                'dob'    => date('1990-04-17'),
                'firstname'     => 'Shane',
                'lastname'      => 'Field',
                'house'     => '14 Hobart Walk',
                'town'      => 'Luton',
                'county'        => 'Beds',
                'country'       => 'UK',
                'postcode'      => 'LU1 4JF',
            ],

            [
                'studentid'    => '60000000',
                'password'    => password_hash('test', PASSWORD_DEFAULT),
                'dob'    => date('1989-09-27'),
                'firstname'     => 'Dean',
                'lastname'      => 'Stratton',
                'house'     => '15 Lancaster Road',
                'town'      => 'St Albans',
                'county'        => 'Herts',
                'country'       => 'UK',
                'postcode'      => 'AL1 6TR',
            ],

            [
                'studentid'    => '70000000',
                'password'    => password_hash('test', PASSWORD_DEFAULT),
                'dob'    => date('1997-03-11'),
                'firstname'     => 'Jasmin',
                'lastname'      => 'Labrooy',
                'house'     => '8 Mistral Court',
                'town'      => 'Wheathampstead',
                'county'        => 'Herts',
                'country'       => 'UK',
                'postcode'      => 'AL5 8WW',
            ]
        ];

        $student = $this->table('student');
        $student->insert($data)
              ->saveData();   
    }
}

