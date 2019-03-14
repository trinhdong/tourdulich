<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(loaitourSeeder::class);
        // $this->call(noidenSeeder::class);
        $this->call(tourSeeder::class);
    }
}

class loaitourSeeder extends Seeder
{
	public function run()
	{
        DB::table('loaitour')->insert([
        	['tenloaitour'=>'Trong nước'],
        	['tenloaitour'=>'Nước ngoài']
        ]);

        //DB::table('loaitour')->truncate();
	}
}

class noidenSeeder extends Seeder
{
	public function run()
	{
        DB::table('noiden')->insert([
        	['tennoiden'=>'Hồ Chí Minh','idloaitour'=>'1'],
        	['tennoiden'=>'Mỹ','idloaitour'=>'2']
        ]);

        //DB::table('loaitour')->truncate();
	}
}
class tourSeeder extends Seeder
{
    public function run()
    {
        DB::table('tour')->insert([
            ['tentour'=>'tour du lịch đầm sen','chude'=>'du lịch đầm sen','noidung'=>'du lịch đầm sen','ngaybatdau'=>'2010-10-10','ngayketthuc'=>'2010-11-10','giatour'=>'10000','noibat'=>'1','hinh'=>'a.jpg','idnoiden'=>'1','iddongtour'=>'1','luotxem'=>'100000'],
            ['tentour'=>'tour du lịch holywood','chude'=>'du lịch holywood','noidung'=>'du lịch holywood','ngaybatdau'=>'2010-10-10','ngayketthuc'=>'2010-11-10','giatour'=>'10000','noibat'=>'1','hinh'=>'b.jpg','idnoiden'=>'2','iddongtour'=>'2','luotxem'=>'100000']
        ]);
    }
}