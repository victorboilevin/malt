<?php

namespace App\Controller;

use App\Entity\Mission;
use League\Plates\Engine;
use App\Repository\MissionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MissionController
{
    private Engine $plates;
    private MissionRepository $missionRepository;
    private $em;

    public function __construct(
        Engine $plates,
        MissionRepository $missionRepository,
        EntityManagerInterface $em
    ) {
        $this->plates = $plates;
        $this->missionRepository = $missionRepository;
        $this->em = $em;
    }

    /**
     * @Route("/mission/create", name="mission_create", priority=-1)
     */
    public function create()
    {
        $html = $this->plates->render("mission/create");
        return new Response($html);
    }

    /**
     * @Route("/missions", name="mission_index")
     */
    public function index()
    {
        $missions = $this->missionRepository->findAll();
        $html = $this->plates->render("mission/index", [
            "missions" => $missions
        ]);
        return new Response($html);
    }

    /**
     * @Route("/missions/{id}", name="mission_show")
     */
    public function show(int $id)
    {
        $mission = $this->missionRepository->find($id);
        $html = $this->plates->render("mission/show", [
            "mission" => $mission
        ]);
        return new Response($html);
    }

    /**
     * @Route("/mission/save", name="mission_save")
     */
    public function save(Request $request, int $id = null)
    {
        $newMission = new Mission;
        $date = new \DateTime($request->request->get("date"));
        $newMission->setTitle($request->request->get("name"));
        $newMission->setPlace($request->request->get("place"));
        $newMission->setDuration($request->request->getInt("duree"));
        $newMission->setDescription($request->request->get("description"));
        $newMission->setStartDate($date);

        $this->em->persist($newMission);
        $this->em->flush();

        return new RedirectResponse("/missions/" . $newMission->getId());
    }

    /**
     * @Route("/mission/edit/{id}", name="mission_edit")
     */
    public function edit(int $id)
    {
        $mission = $this->missionRepository->find($id);
        $html = $this->plates->render("mission/edit", [
            "mission" => $mission
        ]);
        return new Response($html);
    }

    /**
     * @Route("/mission/update_data/{id}", name="mission_update_data")
     */
    public function updateData(Request $request, int $id)
    {
        $editMission = $this->missionRepository->find($id);
        $date = new \DateTime($request->request->get("date"));
        $editMission->setTitle($request->request->get("name"));
        $editMission->setPlace($request->request->get("place"));
        $editMission->setDuration($request->request->getInt("duree"));
        $editMission->setDescription($request->request->get("description"));
        $editMission->setStartDate($date);

        $this->em->flush();

        return new RedirectResponse("/missions/" . $editMission->getId());
    }

    /**
     * @Route("/mission/delete/{id}", name="mission_delete")
     */
    public function delete(int $id)
    {
        $mission = $this->missionRepository->find($id);
        $this->em->remove($mission);
        $this->em->persist($mission);
        $missions = $this->missionRepository->findAll();
        $html = $this->plates->render("mission/index", [
            "missions" => $missions
        ]);
        return new Response($html);
    }
}
