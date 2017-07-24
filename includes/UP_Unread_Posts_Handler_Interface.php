<?php
interface WpTeamInterface{

    /**
     * Save Teams in Database
     *
     * @param array|int $teams 
     * @author Md Abu Ahsan Basir
     * @since 1.0.0
     *
     */
    public function setTeams( $teams );

    /**
     * Get All teams
     *
     * @author Md Abu Ahsan Basir
     * @since 1.0.0
     *
     */
    public function getTeams();

    /**
     * Delete read teams
     *
     * @author Md Abu Ahsan Basir
     * @since 1.0.0
     *
     */
    public function deleteTeam();
}