//------------------------------------------------------------------------------
// <auto-generated>
//     Ce code a été généré à partir d'un modèle.
//
//     Des modifications manuelles apportées à ce fichier peuvent conduire à un comportement inattendu de votre application.
//     Les modifications manuelles apportées à ce fichier sont remplacées si le code est régénéré.
// </auto-generated>
//------------------------------------------------------------------------------

namespace TD1_ASPMVC.Models
{
    using System;
    using System.Collections.Generic;
    
    public partial class Composition_Oeuvre
    {
        public int Code_Composer_Oeuvre { get; set; }
        public Nullable<int> Code_Oeuvre { get; set; }
        public Nullable<int> Code_Composition { get; set; }
    
        public virtual Composition Composition { get; set; }
        public virtual Oeuvre Oeuvre { get; set; }
    }
}
