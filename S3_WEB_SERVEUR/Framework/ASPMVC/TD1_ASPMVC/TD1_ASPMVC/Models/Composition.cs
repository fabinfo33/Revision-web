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
    
    public partial class Composition
    {
        [System.Diagnostics.CodeAnalysis.SuppressMessage("Microsoft.Usage", "CA2214:DoNotCallOverridableMethodsInConstructors")]
        public Composition()
        {
            this.Composition_Oeuvre = new HashSet<Composition_Oeuvre>();
        }
    
        public int Code_Composition { get; set; }
        public string Titre_Composition { get; set; }
        public Nullable<int> Annee { get; set; }
        public string Composante_Composition { get; set; }
    
        [System.Diagnostics.CodeAnalysis.SuppressMessage("Microsoft.Usage", "CA2227:CollectionPropertiesShouldBeReadOnly")]
        public virtual ICollection<Composition_Oeuvre> Composition_Oeuvre { get; set; }
    }
}
