<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\School;

class User extends Authenticatable
{
    use Notifiable;

    protected $appends = ['path'];

    public function getPathAttribute () {

        return asset('storage/'.$this->filename);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile', 'password', 'group_id','deleted_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
//for db1
    public function school()
    {
        return $this->hasOne(School::class);
    }
    public function student()
    {
        return $this->hasOne(Student::class);
    }
    public function staff()
    {
        return $this->hasOne(Staff::class);
    }
    public function committee()
    {
        return $this->hasOne(Commitee::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
//for db2

    public function school2()
    {
        return $this->hasOne(SchoolDb2::class);
    }
    public function student2()
    {
        return $this->hasOne(StudentDb2::class);
    }
    public function staff2()
    {
        return $this->hasOne(StaffDb2::class);
    }
    public function committee2()
    {
        return $this->hasOne(CommiteeDb2::class);
    }

    public function group2()
    {
        return $this->belongsTo(GroupDb2::class);
    }

//for db3
     public function school3()
    {
        return $this->hasOne(SchoolDb3::class);
    }
    public function student3()
    {
        return $this->hasOne(StudentDb3::class);
    }
    public function staff3()
    {
        return $this->hasOne(StaffDb3::class);
    }
    public function committee3()
    {
        return $this->hasOne(CommiteeDb3::class);
    }

    public function group3()
    {
        return $this->belongsTo(GroupDb3::class);
    }

//for db4
     public function school4()
    {
        return $this->hasOne(SchoolDb4::class);
    }
    public function student4()
    {
        return $this->hasOne(StudentDb4::class);
    }
    public function staff4()
    {
        return $this->hasOne(StaffDb4::class);
    }
    public function committee4()
    {
        return $this->hasOne(CommiteeDb4::class);
    }

    public function group4()
    {
        return $this->belongsTo(GroupDb4::class);
    }
}
