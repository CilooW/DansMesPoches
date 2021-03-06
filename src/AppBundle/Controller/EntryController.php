<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Entry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Entry controller.
 *
 */
class EntryController extends Controller
{
    /**
     * Lists all entry entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entries = $em->getRepository('AppBundle:Entry')->findAll();

        return $this->render('entry/index.html.twig', array(
            'entries' => $entries,
        ));
    }

    /**
     * Creates a new entry entity.
     *
     */
    public function newAction(Request $request)
    {
        $entry = new Entry();
        $form = $this->createForm('AppBundle\Form\EntryType', $entry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entry);
            $em->flush($entry);

            return $this->redirectToRoute('entry_show', array('id' => $entry->getId()));
        }

        return $this->render('entry/new.html.twig', array(
            'entry' => $entry,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a entry entity.
     *
     */
    public function showAction(Entry $entry)
    {
        $deleteForm = $this->createDeleteForm($entry);

        return $this->render('entry/show.html.twig', array(
            'entry' => $entry,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing entry entity.
     *
     */
    public function editAction(Request $request, Entry $entry)
    {
        $deleteForm = $this->createDeleteForm($entry);
        $editForm = $this->createForm('AppBundle\Form\EntryType', $entry);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entry_edit', array('id' => $entry->getId()));
        }

        return $this->render('entry/edit.html.twig', array(
            'entry' => $entry,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a entry entity.
     *
     */
    public function deleteAction(Request $request, Entry $entry)
    {
        $form = $this->createDeleteForm($entry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($entry);
            $em->flush($entry);
        }

        return $this->redirectToRoute('entry_index');
    }

    /**
     * Creates a form to delete a entry entity.
     *
     * @param Entry $entry The entry entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Entry $entry)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('entry_delete', array('id' => $entry->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
