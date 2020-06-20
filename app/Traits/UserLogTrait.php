<?php


namespace App\Traits;


use App\models\UserLog;

trait UserLogTrait
{
    private $user_id, $table_name, $previous_data, $current_data, $operation, $remarks;

    public function userId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function tableName($table_name)
    {
        $this->$table_name = $table_name;
        return $this;
    }

    public function previousData($previous_data)
    {
        $this->$previous_data = $previous_data;
        return $this;
    }

    public function currentData($current_data)
    {
        $this->current_data = $current_data;
        return $this;
    }

    public function operation($operation)
    {
        $this->operation = $operation;
        return $this;
    }

    public function remarks($remarks)
    {
        $this->remarks = $remarks;
        return $this;
    }

    public function save()
    {
        $userLog = UserLog::create([

            'user_id' => $this->user_id,
            'table_name' => $this->table_name,
            'previous_data' => $this->previous_data,
            'current_data' => $this->current_data,
            'operation' => $this->operation,
            'remarks' => $this->remarks
        ]);
        return $userLog;
    }
}
