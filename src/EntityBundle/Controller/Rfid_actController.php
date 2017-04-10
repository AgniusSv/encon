<?php

namespace EntityBundle\Controller;

use EntityBundle\Entity\Rfid_act;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Rfid_act controller.
 *
 * @Route("rfid_act")
 */
class Rfid_actController extends Controller
{
    /**
     * Lists all rfid_act entities.
     *
     * @Route("/", name="rfid_act_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rfid_acts = $em->getRepository('EntityBundle:Rfid_act')->findAll();

        return $this->render('rfid_act/index.html.twig', array(
            'rfid_acts' => $rfid_acts,
        ));
    }

    /**
     * Creates a new rfid_act entity.
     *
     * @Route("/new", name="rfid_act_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $rfid_act = new Rfid_act();
        $form = $this->createForm('EntityBundle\Form\Rfid_actType', $rfid_act);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rfid_act);
            $em->flush();

            return $this->redirectToRoute('rfid_act_show', array('id' => $rfid_act->getId()));
        }

        return $this->render('rfid_act/new.html.twig', array(
            'rfid_act' => $rfid_act,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a rfid_act entity.
     *
     * @Route("/{id}", name="rfid_act_show")
     * @Method("GET")
     */
    public function showAction(Rfid_act $rfid_act)
    {
        $deleteForm = $this->createDeleteForm($rfid_act);

        return $this->render('rfid_act/show.html.twig', array(
            'rfid_act' => $rfid_act,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing rfid_act entity.
     *
     * @Route("/{id}/edit", name="rfid_act_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Rfid_act $rfid_act)
    {
        $deleteForm = $this->createDeleteForm($rfid_act);
        $editForm = $this->createForm('EntityBundle\Form\Rfid_actType', $rfid_act);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rfid_act_edit', array('id' => $rfid_act->getId()));
        }

        return $this->render('rfid_act/edit.html.twig', array(
            'rfid_act' => $rfid_act,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a rfid_act entity.
     *
     * @Route("/{id}", name="rfid_act_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Rfid_act $rfid_act)
    {
        $form = $this->createDeleteForm($rfid_act);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rfid_act);
            $em->flush();
        }

        return $this->redirectToRoute('rfid_act_index');
    }

    /**
     * Creates a form to delete a rfid_act entity.
     *
     * @param Rfid_act $rfid_act The rfid_act entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Rfid_act $rfid_act)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rfid_act_delete', array('id' => $rfid_act->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
