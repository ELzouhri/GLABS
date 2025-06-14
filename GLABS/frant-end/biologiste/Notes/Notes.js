   let ecran = document.getElementById("ecran");

    function ajouter(val) {
      if (ecran.value === "0") {
        ecran.value = val;
      } else {
        ecran.value += val;
      }
    }

    function calculer() {
      try {
        ecran.value = eval(ecran.value);
      } catch {
        ecran.value = "Erreur";
      }
    }

    function effacer() {
      ecran.value = "0";
    }
