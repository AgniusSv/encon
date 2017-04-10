<?php

namespace EntityBundle\Controller;

use EntityBundle\Entity\Rfid;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Rfid controller.
 *
 * @Route("rfid")
 */
class RfidController extends Controller
{
    /**
     * Lists all rfid entities.
     *
     * @Route("/", name="rfid_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rfids = $em->getRepository('EntityBundle:Rfid')->findAll();

        return $this->render('rfid/index.html.twig', array(
            'rfids' => $rfids,
        ));
    }

    /**
     * Creates a new rfid entity.
     *
     * @Route("/new", name="rfid_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $rfid = new Rfid();
        $form = $this->createForm('EntityBundle\Form\RfidType', $rfid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rfid);
            $em->flush();

            return $this->redirectToRoute('rfid_show', array('id' => $rfid->getId()));
        }

        return $this->render('rfid/new.html.twig', array(
            'rfid' => $rfid,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a rfid entity.
     *
     * @Route("/{id}", name="rfid_show")
     * @Method("GET")
     */
    public function showAction(Rfid $rfid)
    {
        $deleteForm = $this->createDeleteForm($rfid);

        return $this->render('rfid/show.html.twig', array(
            'rfid' => $rfid,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing rfid entity.
     *
     * @Route("/{id}/edit", name="rfid_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Rfid $rfid)
    {
        $deleteForm = $this->createDeleteForm($rfid);
        $editForm = $this->createForm('EntityBundle\Form\RfidType', $rfid);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rfid_edit', array('id' => $rfid->getId()));
        }

        return $this->render('rfid/edit.html.twig', array(
            'rfid' => $rfid,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a rfid entity.
     *
     * @Route("/{id}", name="rfid_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Rfid $rfid)
    {
        $form = $this->createDeleteForm($rfid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rfid);
            $em->flush();
        }

        return $this->redirectToRoute('rfid_index');
    }

    /**
     * Creates a form to delete a rfid entity.
     *
     * @param Rfid $rfid The rfid entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Rfid $rfid)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rfid_delete', array('id' => $rfid->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
