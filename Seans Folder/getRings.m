function r = getRings(imgPath)
	r = 'Test';
end

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
% Function: getRings
%
% Called From: doVideoAnalysis, doImageAnalysis.
% Returns: An array of rings and their equations.
% Description: Draws rings around each section of the target so that findArrows can easily find the scores.
%
% PSEUDOCODE:
%
% getRings(img):
% 	targetPos = getTargetPos(img)
% 	rings[11] = targetPos[0];
% 	for i in xrange(0,10)):
% 		rings[i] = # Find position of each ring
% 	return rings