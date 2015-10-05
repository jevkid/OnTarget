function r = getUser()
	r = 1;
end

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
% Function: getUser
%
% Called From: doVideoAnalysis, doImageAnalysis.
% Returns: The ID of the user that shot the arrow.
% Description: Finds the current user from the colour of the fletchings and the user array sent from the PHP script.
%
% PSEUDOCODE:
%