<?php 
class FollowingRepository extends DbRepository
{
    public function insert($user_id, $following_id)
    {        
        $sql = "INSERT INTO following VALUES(:user_id, :following_id)";
        $stmt = $this->execute($sql,array(
            ':user_id'      => $user_id,
            ':following_id' => $following_id,
            ));
    }
    
    public function isFollowing($user_id,$following_id)
    {
        $sql = "SELECT COUNT(user_id) as count";
        $sql .= " FROM following";
        $sql .= " WHERE user_id = :user_id";
        $sql .= " AND following_id = :following_id";
        
        $row = $this->fetch($sql,array(
            ':user_id'      => $user_id,
            ':following_id' => $following_id,
            ));
        
        if($row['count'] !== '0'){
            return true;
        }
        
        return false;
    }
}

?>