using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace TD1_ASPMVC.Controllers
{
    public class ExampleController : Controller
    {
        // GET: Example
        public ActionResult Index()
        {
            ViewBag.Title = "La page d'exemple";
            //ViewBag.Message = "La page utilisant un nouveau controleur";
            //ViewBag.Paragraph = "Le paragraphe de description.";
            return View();
        }

        public ActionResult Hello(string id)
        {
            ViewBag.Message = "Bonjour " + HttpUtility.HtmlEncode(id);
            return View();
        }

        public ActionResult Formulaire()
        {
            ViewBag.Title = "Formulaire POST";
            return View();
        }

        public ActionResult AffichageFormulaire()
        {
            return View();
        }
    }
}