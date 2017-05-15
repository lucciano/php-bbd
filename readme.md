# language: es
Característica: Internal operations
  In order to stay secret
  As a secret organization
  We need to be able to erase past agents' memory

  Antecedentes:
    [Dados|Dadas|Dada|Dado|*] there is agent A
    [*|Y|E] there is agent B

  Escenario: Erasing agent memory
    [Dados|Dadas|Dada|Dado|*] there is agent J
    [*|Y|E] there is agent K
    [Cuando|*] I erase agent K's memory
    [Entonces|*] there should be agent J
    [Pero|*] there should not be agent K

  Esquema del escenario: Erasing other agents' memory
    [Dados|Dadas|Dada|Dado|*] there is agent <agent1>
    [*|Y|E] there is agent <agent2>
    [Cuando|*] I erase agent <agent2>'s memory
    [Entonces|*] there should be agent <agent1>
    [Pero|*] there should not be agent <agent2>

    Ejemplos:
      | agent1 | agent2 |
      | D      | M      |

