<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Support OVH</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body style="margin: 0; padding: 0;">
<!-- Email content here !!! -->
<table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="border-collapse: collapse;border: 1.5px solid #cccccc;">
	<tr>
		<td align="center" bgcolor="#fff">
		  <img src="https://vne.riehl-emmanuel.xyz/img/assets/email_builder/back.png" alt="VNE official_logo" width="100%" style="display:block;" title="vne_official"/>
		</td>
	</tr>
	<tr>
		<td bgcolor="#f6fbfe" style="padding: 20px 30px 40px 30px;">
		    <!-- Table for main content -->
			<table cellspacing="0" cellpadding="0" border="0" width="100%">
				<tr>
					<td align="left" style="font-size:25px;font-family: calibri,Helvetica, Arial, sans-serif;color:#231F20;">
						<b>Votre demande de cotation a été prise en compte!</b>
					</td>
				</tr>
				<tr>
					<td align="center" style="font-size:15px;padding-top:14px;font-family: Helvetica, Arial, sans-serif;color:#231F20; line-height: 20px;">
						<?= $quote['quote_subscriber_fullname'] ?>, Vous avez réalisé une demande de cotation-<?= $quote['type']['type']['type_label'] ?> sur <?= $quote['solution']['solution_label'] ?>. Vous serez contacté très prochainement par nos équipes à vos différentes adresses (<?= $quote['quote_subscriber_email'] ?>/<?= $quote['quote_subscriber_tel'] ?>). <br /> <br />
						Pour enrichir votre demande veuillez poursuivre avec un <a target="_blank" href="<?= $quote['type']['type_quote_form_url'] ?>">questionnaire détaillé.</a> ou scannez le code ci-dessous avec votre mobile/tablette.
					</td>
				</tr>
				<tr>
					<td align="center"  style="padding:25px 0 25px 0;">
						<img src="https://vne.riehl-emmanuel.xyz/img/assets/forms_qr/<?= $quote['type']['type_quote_qr_url'] ?>" width="100" alt="quality" style="display:block;"/>
					</td>
				</tr>
				<tr>
					<td align="center" style="font-size: 14px;font-family: Helvetica, Arial, sans-serif;color:#231F20;line-height: 21px;">
						<b>
						   <font color="#122844">Avec votre mobile/tablette vous pouvez scanner ce code afin d'enrichir votre demande en bénéficiant d'une meilleure expérience utilisateur.</font>
					    </b>						
					</td>
				</tr>
				<tr>
					<td align="center" style="padding-top:20px;font-size: 11px;font-family: Helvetica, Arial, sans-serif;color:#807d7d;line-height: 17px;">
						Votre Support Client VNE
						Lun - Vend : 8h - 18h
						22-44-88-82 plus d'infos sur <a href="https://vne.riehl-emmanuel.xyz" target="_blank">www.vne-ci.com</a> 
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td bgcolor="#122844" style="padding: 30px 30px 30px 30px;">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td width="75%">
						<table border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td style="font-family: Helvetica, Arial, sans-serif;color:#fff; font-size: 14px;"><b>Merci de votre confiance,</b> <br /><b>L'équipe VNE</b></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

</body>

</html>